@extends('layouts.vertical', ['title' => 'Add Mock up'])

@section('content')
<style>
    .form-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .remove-question,
    .remove-option {
        cursor: pointer;
        color: #dc3545;
        font-weight: bold;
    }

</style>
<div class="container my-5">
    <h3 class="mb-4">Mock up</h3>
    <form method="post" action="{{ route('questions.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="testName" class="form-label">Test Name</label>
            <select type="text" class="form-control" id="testName" name="test_id"  required>
                @forelse ($tests as $test)
                <option value="{{ $test->id }}">{{ $test->name }}</option>
                
                @empty
                <option value="" disabled selected>Add Test name first</option>
                    
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <strong>Total Questions: <span id="questionCount">0</span></strong>
        </div>

        <div id="questionsContainer"></div>

        <div class="d-flex justify-content-between">
            <button type="button" id="addQuestion" class="btn btn-primary">+ Add Question</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>



</form>
</div>
@endsection

@push('js')
<script>
    let questionIndex = 0;

    function getOptionHTML(qIndex, oIndex, value = "") {
        return `
    <div class="mb-2 option-input" data-option="${oIndex}">
      <div class="input-group">
        <div class="input-group-text">
          <input type="radio" name="questions[${qIndex}][correct]" value="${oIndex}" required>
        </div>
        <input type="text" class="form-control option-field"
               name="questions[${qIndex}][options][${oIndex}]"
               value="${value}" placeholder="Option" data-q="${qIndex}" data-o="${oIndex}" required>
        <button type="button" class="btn btn-outline-danger remove-option">&times;</button>
      </div>
    </div>
  `;
    }

    function getQuestionHTML(qIndex) {
        const options = [0, 1].map(i => getOptionHTML(qIndex, i)).join('');
        return `
    <div class="form-card" data-qindex="${qIndex}">
      <div class="d-flex justify-content-between align-items-start">
        <div class="w-100">
          <div class="mb-3">
            <label>Question ${qIndex + 1} Title</label>
            <input type="text" name="questions[${qIndex}][question_title]" class="form-control" placeholder="Enter question" required>
          </div>
          <div class="mb-3">
            <label>Correct Answer Reason <span class="text-danger">(optional)</span></label>
            <input type="text" name="questions[${qIndex}][answer_reason]" class="form-control" placeholder="Enter Reason Of Correct Answer">
          </div>
          <div class="mb-3 image-upload-container" data-q="${qIndex}">
  <label>Upload Image (optional)</label>
  <div class="position-relative">
    <input type="file" accept="image/*" name="questions[${qIndex}][image]" class="form-control image-input" data-q="${qIndex}">
    <img src="" class="img-preview mt-2 rounded border d-none" style="max-width: 200px;" />
    <button type="button" class="btn btn-sm btn-danger mt-2 remove-image d-none">Remove Image</button>
  </div>
</div>
          <div class="options-container" data-options="${qIndex}">
            ${options}
          </div>
          <button type="button" class="btn btn-sm btn-secondary add-option mt-2" data-q="${qIndex}">+ Add Option</button>
        </div>
        <span class="remove-question ms-3" title="Remove Question">&times;</span>
      </div>
    </div>
  `;
    }

    function addQuestion() {
        $('#questionsContainer').append(getQuestionHTML(questionIndex));
        questionIndex++;
        updateQuestionCount();
    }

    function updateQuestionCount() {
        $('#questionCount').text($('.form-card').length);
    }

    $(document).on('click', '#addQuestion', addQuestion);

    $(document).on('click', '.remove-question', function() {
        $(this).closest('.form-card').remove();
        updateQuestionCount();
    });

    $(document).on('click', '.add-option', function() {
        const qIndex = $(this).data('q');
        const container = $(`.form-card[data-qindex="${qIndex}"] .options-container`);
        const currentCount = container.children('.option-input').length;
        container.append(getOptionHTML(qIndex, currentCount));
    });

    $(document).on('click', '.remove-option', function() {
        const container = $(this).closest('.form-card').find('.options-container');
        $(this).closest('.option-input').remove();
        const qIndex = container.closest('.form-card').data('qindex');
        reindexOptions(container, qIndex);
    });

    function reindexOptions(container, qIndex) {
        container.find('.option-input').each((i, el) => {
            $(el).attr('data-option', i);
            $(el).find('input[type="radio"]').val(i).attr('name', `questions[${qIndex}][correct]`);
            $(el).find('.option-field')
                .attr('name', `questions[${qIndex}][options][${i}]`)
                .attr('data-o', i);
        });
    }

    $(document).on('paste', '.option-field', function(e) {
        e.preventDefault();
        const input = $(this);
        const qIndex = input.data('q');
        const container = $(`.form-card[data-qindex="${qIndex}"] .options-container`);
        const clipboardData = e.originalEvent.clipboardData || window.clipboardData;
        const pastedText = clipboardData.getData('Text');

        const parts = pastedText
            .split(/[\n,]+/)
            .map(v => v.trim())
            .filter(Boolean);

        if (parts.length <= 1) {
            input.val(pastedText);
            return;
        }

        // Remove this and other empty fields
        container.find('.option-input').each(function() {
            const val = $(this).find('.option-field').val().trim();
            if (val === '' || $(this).is(input.closest('.option-input'))) {
                $(this).remove();
            }
        });

        parts.forEach((text, idx) => {
            const newIndex = container.children('.option-input').length;
            container.append(getOptionHTML(qIndex, newIndex, text));
        });

        reindexOptions(container, qIndex);
    });
    // Preview image
    $(document).on('change', '.image-input', function() {
        const input = this;
        const qIndex = $(this).data('q');
        const container = $(`.image-upload-container[data-q="${qIndex}"]`);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                container.find('.img-preview').attr('src', e.target.result).removeClass('d-none');
                container.find('.remove-image').removeClass('d-none');
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove image
    $(document).on('click', '.remove-image', function() {
        const container = $(this).closest('.image-upload-container');
        const qIndex = container.data('q');

        container.find('.image-input').val('');
        container.find('.img-preview').attr('src', '').addClass('d-none');
        container.find('.remove-image').addClass('d-none');
    });


 /*   $('#quizForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "{{ route('questions.store') }}"
            , method: 'POST'
            , data: formData
            , contentType: false
            , processData: false
            , headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
            , success: function(res) {
                // return console.log(res);
                alert(res.message);
                $('#quizForm')[0].reset();
                $('#questionsContainer').html('');
                questionIndex = 0;
                addQuestion();
            }
            , error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let message = '';
                    Object.values(errors).forEach(err => {
                        message += err.join('\n') + '\n';
                    });
                    alert(message);
                } else {
                    console.log(xhr)
                    alert('Something went wrong.');
                }
            }
        });
    });*/

    $(document).ready(addQuestion);

</script>
@endpush
