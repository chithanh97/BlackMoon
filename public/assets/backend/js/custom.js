function responsive_filemanager_callback(field_id){
  var url=jQuery('#'+field_id).val();
  $('#'+field_id).parents('.input-group').find('img').attr('src', url);
}

function removeAccents(str) {
  var AccentsMap = [
  "aàảãáạăằẳẵắặâầẩẫấậ",
  "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
  "dđ", "DĐ",
  "eèẻẽéẹêềểễếệ",
  "EÈẺẼÉẸÊỀỂỄẾỆ",
  "iìỉĩíị",
  "IÌỈĨÍỊ",
  "oòỏõóọôồổỗốộơờởỡớợ",
  "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
  "uùủũúụưừửữứự",
  "UÙỦŨÚỤƯỪỬỮỨỰ",
  "yỳỷỹýỵ",
  "YỲỶỸÝỴ"
  ];
  for (var i=0; i<AccentsMap.length; i++) {
    var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
    var char = AccentsMap[i][0];
    str = str.replace(re, char);
  }
  return str;
}

function checkKeyword() {

  var keyword = $('#seo_keyword').val(),
  count_page_title = 0,
  count_meta_description = 0;

  var seo_title = $('#seo_title').val() || "";
  if (seo_title === ''){
    seo_title = $('input[name=name]').val();
  }
  else seo_title = removeAccents(seo_title);

  var seo_description = $('#seo_description').val() || "",
  seo_meta_decription = removeAccents(seo_description);

  if (keyword.length > 0) {

    var keyword = removeAccents(keyword),
    arr = keyword.split(', ');

    for (var i = 0; i < arr.length; i++) {

      count_page_title += seo_title.split(arr[i].trim()).length-1;
      count_meta_description += seo_meta_decription.split(arr[i].trim()).length-1;

    }

  }
  // console.log(count_page_title);
  // console.log(count_meta_description);
  if (count_page_title > 0) {

    $('#seo_keyword').closest('div').find('.alert li.page_title b').css('color', 'green');
    $('#seo_keyword').closest('div').find('.alert li.page_title b').text('Có (' + count_page_title + ')');

  } else {

    $('#seo_keyword').closest('div').find('.alert li.page_title b').css('color', 'red');
    $('#seo_keyword').closest('div').find('.alert li.page_title b').text('Không');
  }

  if (count_meta_description > 0) {

    $('#seo_keyword').closest('div').find('.alert li.meta_description b').css('color', 'green');
    $('#seo_keyword').closest('div').find('.alert li.meta_description b').text('Có (' + count_meta_description + ')');

  } else {

    $('#seo_keyword').closest('div').find('.alert li.meta_description b').css('color', 'red');
    $('#seo_keyword').closest('div').find('.alert li.meta_description b').text('Không');

  }
}

function delete_img_product_thumbnail(id){
  let value = '/storage/uploads/default/default.png';
  $('#'+id).val(value);
  $('#'+id).parents('.input-group').find('img').attr('src', value);
}

$('.get-subject').on('change paste keyup', function(){

  let val = $(this).val();
  $.ajax({
    url : '/api/subject',
    method : 'POST',
    data : {
      'table' : $(this).data('table'),
      'id' : $(this).data('id'),
      'value' : $(this).val(),
    }
  })
  .done((res) => {

    $('input[name=subject]').val(res);

  });
});

$('#seo_title').on('change paste keyup', function(){
  checkKeyword();
});
$('#seo_description').on('change paste keyup', function(){
  checkKeyword();
});
$('#seo_keyword').on('change paste keyup', function(){
  checkKeyword();
});
$('.changestatus').click(function() {
  $.ajax({
    url: '/api/change-status',
    method: 'POST',
    data: {
      'table' : $(this).data('table'),
      'field' : $(this).data('field'),
      'id' : $(this).data('id'),
    }
  })
  .done((res)=>{
    if(res == 'ok'){
      $(this).toggleClass('active');
    }
  });
});