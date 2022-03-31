<div>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <label class="form-label">Question</label>
                <input class="form-control @error('question') is-invalid @enderror" type="text" name="question" value="{{ old('question', $faq->question) }}">
                @error('question')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4">
                <label class="form-label">Answer</label>
                <textarea class="form-control @error('answer') is-invalid @enderror" type="text" name="answer">{{old('answer', $faq->answer)}}</textarea>
                @error('answer')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-wrap gap-2 pt-4">
    <a type="button" href="{{route('faqs.index')}}" class="btn btn-secondary waves-effect waves-light">Back</a>
    <button type="submit" class="btn btn-info waves-effect waves-light">{{$buttonText}}</button>
</div>
