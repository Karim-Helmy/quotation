<div class="form-group row">
    <label for="language" class="col-sm-2 col-form-label">Language</label>
    <div class="col-sm-10">
        <select class="custom-select mr-sm-2" id="language" name="language" required>
            <option disabled selected >Choose Language</option>
            @foreach ($languages as $language)
                <option
                value="{{ $language->id }}">
                {{ ucfirst($language->language) }}</option>
            @endforeach
        </select>
    </div>
</div>
