// Some random colors
const colors = ["#FCBC0F","#a98307","E1AE09","E6C24E","615221","614B04"];

const numBalls = 120;
const balls = [];


for (let i = 0; i < numBalls; i++) {
    let ball = document.createElement("div");
    ball.classList.add("ball");
    ball.style.background = colors[Math.floor(Math.random() * colors.length)];
    ball.style.left = `${Math.floor(Math.random() * (90 - 10 + 1)) + 10}vw`;
    ball.style.top = `${Math.floor(Math.random()  * (65 - 10 + 1)) + 10}vh`;
    ball.style.transform = `scale(${Math.random()})`;
    ball.style.width = `${Math.random(5 - 1 +1 ) + 0.7}em`;
    ball.style.height = ball.style.width;

    balls.push(ball);
    let e = document.getElementById('jum');
    e.appendChild(ball);
}

// Keyframes
balls.forEach((el, i, ra) => {
    let to = {
        x: Math.random() * (i % 2 === 0 ? -11 : 11),
        y: Math.random() * 12
    };

    let anim = el.animate(
        [
            { transform: "translate(0, 0)" },
            { transform: `translate(${to.x}rem, ${to.y}rem)` }
        ],
        {
            duration: (Math.random() + 1) * 2000, // random duration
            direction: "alternate",
            fill: "both",
            iterations: Infinity,
            easing: "easeOutBounce"
        }
    );
});
