<?php
include_once "default.php";
?>
<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

<div class="jumbotron jumbotron-fluid" id="jum">
        <h1 class="display-12">Happy Honey Shop</h1>
        <p class="lead">Le meilleur e-shop pour acheter vos pots de miel, pollen et gellée royale ! .</p>
        <a href="index.php?ctrl=category&action=findAll"> <button type="button" class="btn btn-primary">Voir le catalogue</button></a>
</div>

<h1 class="fonti"> Nous connaître</h1>

<div class="flexi">

    <div id="txt_owner">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae ligula libero. Nulla
            facilisi. Curabitur quam tellus, convallis vel malesuada non, bibendum in ligula. Fusce id tempus magna.
            Integer lacinia et erat eget efficitur. Phasellus malesuada magna laoreet odio scelerisque varius.
            Suspendisse imperdiet fermentum varius. Ut eget venenatis arcu, vel pretium sem. Proin ac congue elit. Duis
            lacus ipsum, tincidunt et ligula et, egestas vulputate metus. Suspendisse diam augue, aliquam nec nibh
            vitae, lobortis blandit diam. Praesent a interdum metus, ac semper est. Nunc vel felis lorem. Donec eget
            arcu et ero.</p>
    </div>

    <img id="img_owner" src="View/img/home_honey.jpg"/>

</div>
<div class="jumbotron">
    <p class="fonti" id="txt_buy">
        Acheter !
    </p>
    <img src="View/img/booh.jpg">
</div>
<?php
if (isset($_SESSION['user'])) {
    ?>
    <h2>Bienvenue <?php echo $_SESSION['user'] ?> </h2>
    <div class="div_btn">
        <a href="./index.php?ctrl=user&action=gestion" class="action-button shadow animate red">Gérer les
            utilisateurs</a>
    </div>
    <?php
}?>

<footer class="text-center">
    <a href="https://www.freepik.com/free-photos-vectors/badge">Badge vector created by Freepik</a>
</footer>

<script>
    window.sr = ScrollReveal({ reset: true });
    sr.reveal('#img_owner', {origin: 'bottom',  distance: '500px', duration: 760 }, 50);
    sr.reveal('#txt_owner', {origin: 'top'   ,  distance: '500px', duration: 760 }, 50);
    sr.reveal('#txt_buy',   {origin: 'top'   ,  distance: '500px', duration: 900 }, 50);

    // Some random colors
    const colors = ["#FCBC0F", "#a98307", "E1AE09", "E6C24E", "615221", "614B04"];

    const numBalls = 120;
    const balls = [];


    for (let i = 0; i < numBalls; i++) {
        let ball = document.createElement("div");
        ball.classList.add("ball");
        ball.style.background = colors[Math.floor(Math.random() * colors.length)];
        ball.style.left = `${Math.floor(Math.random() * (90 - 10 + 1)) + 10}vw`;
        ball.style.top = `${Math.floor(Math.random() * (65 - 10 + 1)) + 10}vh`;
        ball.style.transform = `scale(${Math.random()})`;
        ball.style.width = `${Math.random(5 - 1 + 1) + 0.7}em`;
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
                {transform: "translate(0, 0)"},
                {transform: `translate(${to.x}rem, ${to.y}rem)`}
            ],
            {
                duration: (Math.random() + 1) * 2000, // random duration
                direction: "alternate",
                fill: "both",
                iterations: Infinity,
                easing: "ease-in-out"
            }
        );
    });

</script>

