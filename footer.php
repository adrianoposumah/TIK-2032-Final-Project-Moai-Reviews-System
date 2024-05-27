    <footer>
      <div class="footer-content">
        <div class="logo">
          <img src="./image/auth-picture/logo.png" alt="" />
        </div>
        <div class="categories">
          <h4>Categories</h4>
          <div class="columns">
            <ul>
              <?php foreach ($categories as $category) : ?>
                <li><a href="#"><?= $category['name'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="bottom-area">
          <div class="copyright">
            <p>2024 Copyright All Rights Reserved</p>
          </div>
          <div class="about">
            <p>About Us</p>
            <i class="fa-solid fa-chevron-up"></i>
          </div>
        </div>
      </div>
    </footer>

  </body>
  <!-- <script src="script.js"></script> -->
  <script src="./script/script.js?v=<?php echo time(); ?>"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('myTextarea');
        textarea.addEventListener('input', autoResizeTextarea);
    });

    function autoResizeTextarea() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    }

    function wrapText(tag, attribute = '') {
        const textarea = document.getElementById('myTextarea');
        const startPos = textarea.selectionStart;
        const endPos = textarea.selectionEnd;
        const selectedText = textarea.value.substring(startPos, endPos);
        const replacement = `<${tag} ${attribute}>${selectedText}</${tag}>`;
        textarea.value = textarea.value.substring(0, startPos) + replacement + textarea.value.substring(endPos);
    }

    function wrapLink() {
        const url = prompt('Enter URL:');
        if (url) {
            wrapText('a', `href="${url}"`);
        }
    }

    function wrapSpoiler() {
        const textarea = document.getElementById('myTextarea');
        const startPos = textarea.selectionStart;
        const endPos = textarea.selectionEnd;
        const selectedText = textarea.value.substring(startPos, endPos);
        const replacement = `<tes>${selectedText}</tes>`;
        textarea.value = textarea.value.substring(0, startPos) + replacement + textarea.value.substring(endPos);
    }

    function clearText() {
        document.getElementById('myTextarea').value = '';
    }

    // document.getElementById('commentForm').addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     const comment = document.getElementById('myTextarea').value;
    //     console.log(comment);
    // });

    //     document.addEventListener('DOMContentLoaded', function () {
    //         const commentForm = document.getElementById('commentForm');

    //         commentForm.addEventListener('submit', function (event) {
    //             event.preventDefault();
                
    //             const formData = new FormData(commentForm);

    //             fetch('process_comment.php', {
    //                 method: 'POST',
    //                 body: formData
    //             })
    //             .then(response => response.json())
    //             .then(data => {
                  
    //                 if (data.success) {
                     
    //                     console.log('Comment added successfully.');
                       
    //                     fetchComments(); 
    //                 } else {
    //                     console.error(data.message);
                    
    //                 }
    //             })
    //             .catch(error => {
    //                 console.error('Error:', error);
    //             });
    //         });

        
    //         function fetchComments() {
      
    //         }
    //     });
    </script>



</html>
