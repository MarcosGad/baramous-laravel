@extends('layouts.appadmin')

@section('content')
  <br />
  <div class="container box">
   <h3 align="center">البريد</h3><br />


<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>

                    <div class="form-group">
                        <label>عنوان الرسالة</label>
                        <input type="text" id="title" name="title" class="form-control"/>
                    </div>
                   
                    <div class="form-group">
                        <label>رسالتك</label>
                        <textarea type="text" id="message" name="message" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="btn btn-primary primary-admin" name="student_id" id="student_id" value="" />
                    <input type="hidden" class="btn btn-primary primary-admin" name="button_action" id="button_action" value="insert" />
                    <input type="submit" class="btn btn-primary primary-admin" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>

   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5">
       <div class="form-group row">
                            
   
                            <div class="col-md-9">
                            <div class="row">

                               <div class="col-4">
                               <label for="birth_day">يوم</label>
                                <span>
                                <input name="birth_day" id="birth_day" type="number" min="0" value="0" class="form-control">
                                </span>
                                </div>
                                
                                <div class="col-4">
                                <label for="birth_month">شهر</label>
                                <span>
                                <input name="birth_month" id="birth_month" type="number" min="0" value="0" class="form-control">
                                </span>
                                </div>
                                
                                <div class="col-4">
                                <label for="birth_year" >سنة</label>
                                <span>

                                <input name="birth_year" id="birth_year" type="number" min="0" value="0" class="form-control">
                                </span>
                                </div>
                                
                             </div>
                                <div class="row" style="margin-top:10px;">
                                <div class="col-2">
                                   <label for="user_name" >الأسم</label>
                                </div>
                                
                                <div class="col-8">
                                <input name="user_name" id="user_name" type="text" class="form-control">   
                                </div>
                                </div>
                            
                                
                            </div>
                          
                        </div>
       </div>
      <div class="col-md-3" style="margin-top: 35px;">
       <button type="button" name="filter" id="filter" class="btn btn-success btn-sm">بحث</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-primary primary-admin btn-sm">اعادة التحميل</button>
       <button type="button" class="btn btn-sm btn-primary edit btn-mass">ارسل رسالتك</button>

      </div>
     </div>
    </div>
      <table class="table">
       <thead class="thead-dark">
        <tr>
         <th>الاسم</th>
         <th>البريد الالكترونى</th>
         <th>رقم المحمول</th>
         <th>تاريخ الميلاد</th>
         <th>الدراسة/العمل</th>
         <th>المحافظة</th>
         <th>الكنيسة/الأيبارشية</th>
         <th> اب الاعتراف</th>
         
         <th>
           <input type="checkbox" name="student_checkbox"  class="selectall"/> اختار الكل
         </th>
        </tr>   
       </thead>
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
$(document).ready(function(){

 var date = new Date();
 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(birth_day = '', birth_month = '', birth_year = '', user_name = '')
 {
  $.ajax({
   url:"{{ route('admin.daterange.fetch_data') }}",
   method:"POST",
   data:{birth_day:birth_day, birth_month:birth_month, birth_year:birth_year,user_name:user_name,  _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    {
     output += '<tr>';
     output += '<td>' + data[count].name + '</td>';
     output += '<td>' + data[count].email + '</td>';
     output += '<td>' + data[count].phone_number + '</td>';
     output += '<td>' + data[count].birth_day + ' - ' + data[count].birth_month + ' - ' +data[count].birth_year + '</td>';
     output += '<td>' + data[count].work + '</td>';
     output += '<td>' + data[count].city + '</td>';
     output += '<td>' + data[count].church + '</td>';
     output += '<td>' + data[count].father + '</td>';
     
     var id = data[count].id
     output += "<td> <input type='checkbox' class='student_checkbox individual' name='student_checkbox[]' value="+ id +"></td>";

    }
    $('tbody').html(output);
   }
  })
 }

 $('#filter').click(function(){
  var birth_day = $('#birth_day').val();
  var birth_month = $('#birth_month').val();
  var birth_year = $('#birth_year').val();
  var user_name = $('#user_name').val();
  if(birth_day != '' && birth_month != '' && birth_year != '')
  {
   fetch_data(birth_day, birth_month, birth_year, user_name);
  }
  else
  {
   alert('برجاء ادخال الحقول');
  }
 });

 $('#refresh').click(function(){
  $('#birth_day').val('0');
  $('#birth_month').val('0');
  $('#birth_year').val('0');
  $('#user_name').val('');
  fetch_data();
 });

///////////////////////////////////////////////////////////////////////////////////////////////// 

var ids = [];

$('#student_form').on('submit', function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    console.log(ids);
    $.ajax({
        url:"{{ route('daterange.postdata') }}",
        method:"POST",
        dataType:"json",
        data : {
            models : ids,
            _token : $("[name='_token']").val(),
            button_action : "insert",
            title   : $("#title").val(),
            message : $("#message").val(),
        },
        success:function(data)
        {
            if(data.error.length > 0)
            {
                var error_html = '';
                for(var count = 0; count < data.error.length; count++)
                {
                    error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                }
                $('#form_output').html(error_html);
            }
            else
            {
                $('#form_output').html(data.success);
                $('#student_form')[0].reset();
                $('#button_action').val('insert');
                $('#studentModal').modal('hide');
                alert('تم الأرسال بنجاح'); 
            }
        }
    })
});



$(document).on('click', '.edit', function(){
    ids = [];
    $('#form_output').html('');
    $('.student_checkbox:checked').each(function(){
            ids.push($(this).val());
        });
        if(ids.length > 0)
        {
                   $('#studentModal').modal('show');
                   $('#action').val('ارسال');
        }
        else
        {
            alert("الرجاء تحديد خانة اختيار واحدة على الأقل");
        }
});

$(".selectall").click(function(){
$(".individual").prop("checked",$(this).prop("checked"));
});

});

</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script>
    $(document).ready(function() {
      $('#message').summernote();
    });
</script>

@endsection
