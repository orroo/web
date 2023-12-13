function showTab(panelIndex) {
    tabs.forEach(function (node) {
        node.style.display = 'none';
    });
    tabs[panelIndex].style.display = 'block';
}

$('.nav ul li').click(function () {
    $(this).addClass("active").siblings().removeClass('active');
});

const tabBtn = document.querySelectorAll('.nav ul li');
const tabs = document.querySelectorAll('.tab');

showTab(0); 


let bio = document.querySelector('#bio');
function bioText() {
    bio.oldText = bio.innerText;
    if (bio) {
        let truncatedText = bio.innerText.substring(0, 100) + "...";
        bio.innerHTML = truncatedText + "&nbsp;<br><span onclick='addLength()' id='see-more-bio'>See More</span>";
    } else {
        console.error("Bio element not found.");
    }
}
bioText();

function addLength() {
    bio.innerHTML = bio.oldText;
    bio.innerHTML +="&nbsp;<br><span onclick='bioText()' id='see-less-bio'>See Less</span>";
}