<script>
const csrf_token = $('input[name=_token]').val();

const selectCategory = (select) => {
    const language_id = select.value
    $.ajax({
        method: "POST",
        url: "{{ route('getCategories') }}",
        data: {
            _token: csrf_token ,
            language_id: language_id
        } ,
        success: (results)=>{
            var _html = "<select class=\"custom-select mr-sm-2\" id=\"category\" name=\"category\" required><option disabled selected >Choose Category</option>";
            results.map((res) => {
                _html += "<option value='"+res.id+"'>"+res.category+"</option>"
            })
            _html += '</select>';
            $("#_category").html(_html);
        } ,
    })
}
// Select Categories In Admin / Create Category

const DeActive = (button)=>{
    const language_id = button.value;
    $.ajax({
        method: "POST",
        url:"{{ route('deactivate_language') }}",
        data: {
            _token: csrf_token,
            language_id: language_id
        },
        success: (results) => {
           if (results == 'updated') {
               button.classList.add('btn-info');
               button.classList.remove('btn-success');
               button.innerHTML = 'In Active';
               button.style.cursor = 'not-allowed'
               button.title = 'Was De Activated Successfully :)';
               button.onclick = () => {return false;}
           }
        }
    })
}

const Active = (button) => {
    const language_id = button.value;
    $.ajax({
        method: "POST",
        url:"{{ route('activate_language') }}",
        data: {
            _token: csrf_token,
            language_id: language_id
        },
        success: (results) => {
           if (results == 'updated') {
               button.classList.add('btn-success');
               button.classList.remove('btn-info');
               button.innerHTML = 'Active';
               button.style.cursor = 'not-allowed'
               button.title = 'Was Activated Successfully :)';
               button.onclick = () => {return false;}
           }
        }
    })
}

</script>
