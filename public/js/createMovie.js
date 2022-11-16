document.getElementById('btn-add-actor').addEventListener('click', function() {
    document.getElementById('actor-fields').innerHTML += '\
    <div class="col-md-6">\
        <label for="actors[]" class="form-label">Actor</label>\
        <select name="actors[]" class="form-select">\
            @foreach ($actors as $a)\
                <option value="{{ $a->name }}">{{ $a->name }}</option>\
            @endforeach\
        </select>\
    </div>\
    <div class="col-md-6">\
        <label for="characters[]" class="form-label">Character Name</label>\
        <input type="text" class="form-control" name="characters[]">\
    </div>'
})
