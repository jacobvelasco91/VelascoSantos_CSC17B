function geturl(url){
  var info = url.split('?');

  var nameVpair = info[1].split('&');
  

  for (var i = 0; i < nameVpair.length; i++) {
  console.log(nameVpair[i]);

  }
}
