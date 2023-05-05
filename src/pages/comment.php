<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .comment-input_element{
        max-width: 300px;
    }
    .comment-input_element input{
        padding: 6px;
    }

    .comment-input_element button{
        padding: 6px;
        background-color: black;
        color: white;
        cursor: pointer;

    }
    .comment{
        max-width: 300px;
        background-color: gray;
        padding: 10px;

    }

    .comment .comment-reply{
        cursor: pointer;
        margin-left: 80%;
    }
    .comment-reply_box{
        display: none;
        margin-left: 30px;
    }
    .comment-reply_box.active{
        display: block;
    }
</style>
<body>
    <div class="comment-system_container">
        <div class="comment-input_element">
            <input type="text" class="comment-input" name="comment" placeholder="comment" />
            <button class="comment-btn" >comment</button>
        </div>
        <div class="comments">
            
        </div>
    </div>

    <script>
        let comments = [{comment : 'hello world', replies : [ {reply: "yes hello world 2"}, {reply: "yes hello world 3"}]}]
        let commentsContainer = document.querySelector('.comments')

      
        let displayComments = () => {
            comments.forEach((comment, i) => {
                commentsContainer.innerHTML +=
                `
                <div class="comment">
                <p class="comment-text">${comment.comment}</p>
                <button class="comment-reply" onclick='commentReply(${i})'>reply</button>
                <div class="comment-reply_box">
                    <div class="replied-comment">
                        <p class="comment-text">
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas necessitatibus maiores aut rem quis molestiae aliquam magnam repellat eos, impedit praesentium iusto totam at sapiente nulla in delectus expedita unde.

                        </p>
                        <button class="nested-comment_reply">reply</button>
                    </div>
                    <input type="text">
                    <button>reply</button>
                </div>
            </div>
                `
            })
        }

        displayComments()


        let commentInput = document.querySelector('.comment-input')
        let commentBtn =document.querySelector('.comment-btn');
        console.log(commentBtn)
        let commentReplyBtn = document.querySelectorAll('.comment-reply')
        let commentReplyBox =document.querySelectorAll('.comment-reply_box')

commentBtn.addEventListener('click', () =>{
    let comment = commentInput.value
    let commentData = {
        comment,
        reply: '',
    }
    comments.push(commentData)
    displayComments()

})


        let commentReply = (el) => {
            commentReplyBox[el].classList.toggle('active')
        }
        commentReplyBtn.forEach((replyBtn, i) => {
            replyBtn.addEventListener('click', () =>{
            })
        })
    </script>
</body>
</html>