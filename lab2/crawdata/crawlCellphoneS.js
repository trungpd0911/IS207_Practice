let data = [];

const crawlOneProduct = async () => {
    let imgTag1 = document.querySelectorAll(".swiper-slide.swiper-slide-active")[1];
    let imgTag2 = imgTag1.querySelector("img");
    let imgSrc = imgTag2.getAttribute("src");

    let detailTag = document.querySelector('.button.button__show-modal-technical.my-3.is-flex.is-justify-content-center')
    await detailTag.click();
    let detailTag1 = document.querySelector('.technical-content-modal');
    let detailTag2 = detailTag1.querySelectorAll('li');
    // vi xu li, do hoa
    let graphicCard = detailTag2[0].querySelectorAll('div')[2].textContent;
    let CPUType = detailTag2[0].querySelectorAll('div')[4].textContent;

    // ram, o cung 


    data.push({
        imgSrc: imgSrc,
        graphicCard: graphicCard,
        CPUType: CPUType,
    });
}
console.log(data);