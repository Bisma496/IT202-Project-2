document.addEventListener('DOMContentLoaded', () => {
 const form=document.getElementById('representativeForm'); if(!form)return;
 const pw=document.getElementById('password'), toggle=document.getElementById('togglePassword'), check=document.getElementById('emailConfirmation'), email=document.getElementById('email');
 toggle?.addEventListener('click',()=>{pw.type=pw.type==='password'?'text':'password';toggle.setAttribute('aria-pressed',String(pw.type==='text'));});
 form.addEventListener('submit',e=>{
  const required=['firstName','lastName','password','representativeId','phone','transaction'];
  for(const id of required){const el=document.getElementById(id);if(!el.value.trim()){e.preventDefault();alert('Please complete '+id+'.');el.focus();return;}}
  if(!/^.{1,7}$/.test(pw.value)||!/^[^A-Za-z0-9]/.test(pw.value)||!/[A-Z]/.test(pw.value)||!/\d/.test(pw.value)){e.preventDefault();alert('Password must start with a symbol, include an uppercase letter and digit, and be at most 7 characters.');return;}
  if(!/^\d{4}$/.test(document.getElementById('representativeId').value)){e.preventDefault();alert('Representative ID must be four digits.');return;}
  if(check.checked&&!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)){e.preventDefault();alert('Enter a valid email address.');email.focus();}
 });
});
