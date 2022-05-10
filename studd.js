const blur = document.getElementById("blur");
const revblur = document.getElementById("revblur");
const toolbox = document.getElementById("toolbox");
const to = document.getElementById("toolcl");
const tools = document.getElementById("tools");		
function opentools()
{
revblur.style.display="none";
blur.style.display="block";
toolbox.style.display="none";
to.style.display="block";
tools.style.display="block";
}
function closetools()
{
revblur.style.display="block";
tools.style.display="none";
blur.style.display="none";
toolbox.style.display="";
to.style.display="none";
}