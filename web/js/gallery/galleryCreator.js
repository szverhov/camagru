
var paggination = 0;

document.addEventListener('scroll', function(){
	createGallery();
});

var index = 0;


function createGallery()
{
	for (; index < galleryData.length; index++)
	{
		if (document.body.scrollHeight > window.outerHeight + window.scrollY)
			break;
		
		var postBlock = document.createElement('div');
		var captionBlock = document.createElement('div');

		var imgComentBLock = document.createElement('div');
		var img = document.createElement('img');
		var comentBlock = document.createElement('div');

		var dateEl = document.createElement('div');
		var captionEl = document.createElement('div');
		var userName = document.createElement('div');

		var postID = document.createElement('input');
		var userID = document.createElement('input');
		var userDataBlock = document.createElement('userDataBlock');
		var postLikeBlock = document.createElement('div');
		var postLikeBlockCount = document.createElement('p');
		var changerImgCommetns = document.createElement('button');

		fillCommentBlock(comentBlock, galleryData[index]['comments'], galleryData[index]['id'], galleryData[index]['userID']);
		addSelectorImgComments(changerImgCommetns, img, comentBlock);

 
		postID.name = 'postID';
		userID.name = 'userID';

		changerImgCommetns.classList.add('myButton');
		comentBlock.classList.add('comentBlock');
		userDataBlock.classList.add('userDataBlock');
		postBlock.classList.add('postBlock');
		img.classList.add('postImg');
		captionBlock.classList.add('captionBlock');
		dateEl.classList.add('postDateEl');
		postLikeBlock.classList.add('heart');
		postID.classList.add('hiddenEl');
		userID.classList.add('hiddenEl');
		userName.classList.add('userName');
		captionEl.classList.add('captionEl');

		postLikeBlockCount.innerHTML = galleryData[index]['likeCount'];
		if (galleryData[index]['allreadyLiked'] == 1)
		{
		    postLikeBlock.style.backgroundPosition = "-2800px 0";
      		postLikeBlock.style.transition = 'background 1s steps(28)';   	
		}
		postLikeBlock.appendChild(postLikeBlockCount);
		changerImgCommetns.innerHTML = 'Show comments';
		userName.innerHTML = galleryData[index]['login'];
		img.src = galleryData[index]['imagePath'] + galleryData[index]['imageName'];
		dateEl.innerHTML = galleryData[index]['date'];
		captionEl.innerHTML = galleryData[index]['caption'];
		postID.value = galleryData[index]['id'];
		userID.value = galleryData[index]['userID'];
		postID.type = 'hidden';
		userID.type = 'hidden';

		addHeartButtonEventListener(postLikeBlock);

		imgComentBLock.appendChild(img);
		imgComentBLock.appendChild(comentBlock);

		captionBlock.appendChild(userName);
		captionBlock.appendChild(dateEl);

		postBlock.appendChild(captionBlock);
		postBlock.appendChild(imgComentBLock);
		postBlock.appendChild(postID);
		postBlock.appendChild(userID);
		postBlock.appendChild(captionEl);
		postBlock.appendChild(changerImgCommetns);
		postBlock.appendChild(postLikeBlock);

		galleryMainBlock.appendChild(postBlock);
	}
}

function addSelectorImgComments(button, img, comments)
{
	button.addEventListener('click', function() {
		if (button.innerHTML == 'Show comments')
		{
			img.classList.add('hiddenEl');
			img.classList.remove('postImg');

			comments.classList.remove('hiddenEl');
			comments.classList.add('comentBlock');
			button.innerHTML = 'Show image';
		}
		else
		{
			img.classList.add('postImg');
			img.classList.remove('hiddenEl');

			comments.classList.remove('comentBlock');
			comments.classList.add('hiddenEl')
			button.innerHTML = 'Show comments';

		}	
	})
}