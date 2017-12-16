var quantity = 0;
function addCart() {
++quantity;
var cname = "q";
document.cookie = cname+"="+quantity;
}
