function _(id)
{
  return document.getElementById(id);
}
function pi(s)
{
  return parseInt(s);
}
function phoneNumber(x,event)
{
  var c=(event.which) ? event.which : event.keyCode;
  if((c > 31 && (c < 48 || c > 57)) && !(c>95 && c<106))
  {
    event.preventDefault();
    return false;
  }
}
function resetForm(p,x)
{
  p.type="password";
  x.innerHTML="Show Password";
  x.classList.remove("btn-outline-info");
  x.classList.add("btn-outline-warning");
}
function togglePassword(x)
{
  var p=_("signup_password");
  if(p.type=="password")
  {
    p.type="text";
    x.innerHTML="Hide Password";
    x.classList.remove("btn-outline-warning");
    x.classList.add("btn-outline-info");
  }
  else
  {
    resetForm(p,x);
  }
}
