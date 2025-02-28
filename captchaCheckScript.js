const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const captchaResponse = grecaptcha.getResponse();

    if (!captchaResponse.length > 0) {
        throw new Error("Captcha not complete");
    }

    const fd = new FormData(e.target);
    const params = new URLSearchParams(fd);

    fetch('https://www.compnet2025.com:3000/upload', {
        method: "POST",
        body: params,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', // Fix the typo here
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.captchaSuccess) {
            console.log("Validation successful");
        }else {
            console.error("Validation Failed");
        }
    })
    .catch(err => console.error(err))

});