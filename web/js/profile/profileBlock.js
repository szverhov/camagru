var allRightChilds = [];

function fillProfileMainBlock()
{
	var leftSelectorBlock = createLeftSelectorBlock();
	var rightSelectorBlock = createRightSelectorBlock();
	appendButtonToLeftBlock(leftSelectorBlock, createChangePasswordBlock(rightSelectorBlock), 'passwordBlockForm', 'Change password');
	appendButtonToLeftBlock(leftSelectorBlock, createChangeEmailBlock(rightSelectorBlock), 'changeEmailBlock', 'Change email');
	appendButtonToLeftBlock(leftSelectorBlock, createChangeLoginBlock(rightSelectorBlock), 'changeLoginBlock', 'Change login');
	appendButtonToLeftBlock(leftSelectorBlock, createChangeNotificationBlock(rightSelectorBlock), 'changeNotificationBlock', 'Notifications');
}

function createLeftSelectorBlock()
{
	var res = document.createElement('div');
	res.classList.add('leftSelectorBlock');
	profileUserBlock.appendChild(res);
	return res;
}

function createRightSelectorBlock()
{
	var res = document.createElement('div');
	res.classList.add('rightSelectorBlock');
	profileUserBlock.appendChild(res);
	return res;	
}

function appendButtonToLeftBlock(parent, block, className, buttonText)
{

	var bttn = document.createElement('bttn');
	bttn.classList.add('myButton');
	bttn.innerHTML = buttonText;

	bttn.addEventListener('click', function(){
		for (var q in allRightChilds)
			if (allRightChilds[q].getAttribute('class') != block.getAttribute('class') && allRightChilds[q].clientHeight)
			{
				allRightChilds[q].setAttribute('class', 'hiddenEl');
			}
		if (block.clientHeight > 0)
		{
			block.classList.remove(className);
			block.classList.add('hiddenEl');
		}
		else
		{
			block.classList.remove('hiddenEl');
			block.classList.add(className);
		}
	});
	parent.appendChild(bttn);
}
