function showMore() {

    var listData = Array.prototype.slice.call(document.querySelectorAll('#dataList li:not(.shown)')).slice(0, 4);

  for (var i=0; i < listData.length; i++)
  {
    listData[i].className  = 'shown';
  }
  switchButtons();
}

function showLoai() {

    var listData = Array.prototype.slice.call(document.querySelectorAll('#loaiList li:not(.shown)')).slice(0, 12);

  for (var i=0; i < listData.length; i++)
  {
    listData[i].className  = 'shown';
  }
  switchButtons();
}


onload= function(){
    showMore();
}

onload= function(){
    showLoai();
}