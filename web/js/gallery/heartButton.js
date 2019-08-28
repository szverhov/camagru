function addHeartButtonEventListener(el)
{
  el.addEventListener('click', function ()
  {
    var countEl = getCountEl(el);
    if (el.style.backgroundPosition.indexOf("-2800px 0") != -1)
    {
      el.style.backgroundPosition = "0 0";
      el.style.transition = '';
      countEl.innerHTML = parseInt(countEl.innerHTML) - 1;
    }
    else
    {
      countEl.innerHTML = parseInt(countEl.innerHTML) + 1;
      el.style.backgroundPosition = "-2800px 0";
      el.style.transition = 'background 1s steps(28)';   
    }
    saveLike(el);
  });
}

function getCountEl(parent)
{
  var childs = parent.childNodes;
  for (var q in childs)
  {
    if (childs[q].tagName == 'P')
      return childs[q];
  }
}

function saveLike(heartButton)
{
  var tmpArr = getPostIds(heartButton);
  var request = new XMLHttpRequest();
  var formData = new FormData();
  formData.append("postID", tmpArr['postID']);
  formData.append("userID", tmpArr['userID']);

  request.open('POST', '/gallery/save-like', true);
  request.onreadystatechange = function()
  {
      if(request.readyState == 4 && request.status == 200)
      {
        // var res = JSON.parse(request.responseText);

      }
  } 
  request.send(formData);  
}

function getPostIds(el)
{
  var res = [];
  var parentNode = el.parentNode;
  var childs = parentNode.childNodes;
  for (var q in childs)
  {
    if (childs[q] && childs[q].tagName == 'INPUT')
    {
      res[childs[q].name] = childs[q].value;
    }
  }
  return res;
}