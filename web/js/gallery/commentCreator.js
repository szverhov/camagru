function fillCommentBlock(el, commentsArr, postID, userID)
{
	el.classList.add('hiddenEl');
	var allComments = document.createElement('div');
	if (commentsArr.length > 0)
	{
		for (var q in commentsArr)
		{
			var singleCommentBlock = document.createElement('div');
			var userName = document.createElement('p');
			var commentText = document.createElement('p');
			var commentDate = document.createElement('p');

			singleCommentBlock.classList.add('singleCommentBlock')
			commentDate.classList.add('commentDate');

			userName.innerHTML = commentsArr[q]['login'] + ':'; 
			commentText.innerHTML = commentsArr[q]['text'];
			commentDate.innerHTML = commentsArr[q]['date'];

			singleCommentBlock.appendChild(userName);
			singleCommentBlock.appendChild(commentText);
			singleCommentBlock.appendChild(commentDate);

			allComments.appendChild(singleCommentBlock)
		}
	}
	el.appendChild(allComments);
	var senderBox = document.createElement('senderBox');
	var addCommentTextArea = document.createElement('textarea');
	var sendButton = document.createElement('button');

	sendButton.classList.add('myButton');

	sendButton.innerHTML = 'Add comment';

	senderBox.appendChild(addCommentTextArea);
	senderBox.appendChild(sendButton);
	senderBox.classList.add('senderBox');
	el.appendChild(senderBox);

	sendButton.addEventListener('click', function(){
		if (addCommentTextArea.value != '' && g_user_logged_in && addCommentTextArea.value.length < 30000)
		{
			var request = new XMLHttpRequest();
			var formData = new FormData();
			formData.append("comment", addCommentTextArea.value);
			formData.append("postID", postID);
			formData.append("userID", userID);


			request.open('POST', '/gallery/save-comment', true);
			request.onreadystatechange = function()
			{
				if(request.readyState == 4 && request.status == 200)
				{
			  		addCommentTextArea.value = '';
			    	var res = JSON.parse(request.responseText);

					var singleCommentBlock = document.createElement('div');
					var userName = document.createElement('p');
					var commentText = document.createElement('p');
					var commentDate = document.createElement('p');

					singleCommentBlock.classList.add('singleCommentBlock')
					commentDate.classList.add('commentDate');

					userName.innerHTML = res['login'] + ':'; 
					commentText.innerHTML = res['text'];
					commentDate.innerHTML = res['date'];

					singleCommentBlock.appendChild(userName);
					singleCommentBlock.appendChild(commentText);
					singleCommentBlock.appendChild(commentDate);

					allComments.appendChild(singleCommentBlock)
				}
			} 
			request.send(formData);
		}
	});
}