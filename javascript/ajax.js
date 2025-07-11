function fetchPosts() {
    fetch("get_posts.php")
        .then(res => res.json())
        .then(data => {
            let postsHTML = "";
            data.forEach(post => {
                postsHTML += `
                    <div class="post">
                        <p><strong>${post.username}</strong></p>
                        <p>${post.content}</p>
                        ${post.image ? `<img src="${post.image}" alt="Post Image">` : ""}
                    </div>
                `;
            });
            document.getElementById("postsContainer").innerHTML = postsHTML;
        });
}
fetchPosts();
