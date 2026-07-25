<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CC-IT-Solutions – Making IT happen</title>
<meta name="description" content="CC-IT-Solutions: IT-oplossingen voor particulieren en zelfstandigen in Gent.">
<link rel="stylesheet" href="style.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-79E4C2GD2P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-79E4C2GD2P');
</script>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>
<body>

<header>
  <img src="img/logo.png" alt="CC-IT-Solutions">
</header>

<section class="hero">
  <div class="hero-inner">
    <div class="hero-text">
      <h1>Making IT happen</h1>
    </div>
    <div class="hero-img">
      <img src="img/banner.jpg" alt="">
    </div>
  </div>
</section>

<section id="diensten">
  <h2>Aangeboden diensten</h2>
  <div class="services">
    <div class="service">
      <img src="img/ethernet.png" alt="Netwerkaanleg">
      <h3>Netwerkaanleg</h3>
      <p>Met moderne UniFi technologie zorg ik er voor dat u snel en betrouwbaar verbonden bent.</p>
    </div>
    <div class="service">
      <img src="img/question.png" alt="Advies">
      <h3>Advies</h3>
      <p>Niet zeker wat de beste volgende stap is? Ik help u met al uw vragen.</p>
    </div>
    <div class="service">
      <img src="img/maintenance.png" alt="Onderhoud en herstel">
      <h3>Onderhoud en herstel</h3>
      <p>Loopt uw computer trager dan normaal? Ik breng hem terug tot leven.</p>
    </div>
  </div>
</section>

<section id="over">
  <h2>Over mij</h2>
  <div class="about">
    <div class="about-img">
      <img src="img/photo.jpg" alt="Charan Chander">
    </div>
    <div class="about-text">
      <p>Mijn naam is Charan, ik ben een gedreven informaticus met een passie voor systeem en netwerkbeheer, afgestudeerd aan HOGENT.</p>
      <p>Na jaren studie wil ik mijn kennis tot werk omzetten en mensen helpen met al hun IT problemen.</p>
      <p>Particulier of bedrijf, ik wil u met plezier een antwoord bieden op uw vraag. Of dit nu gaat over een trage thuiscomputer, of het opzetten van een WiFi netwerk, laat maar komen.</p>
      <p><a href="https://charanchander.be">charanchander.be</a></p>
    </div>
  </div>
</section>

<section id="contact">
  <h2>Contact</h2>
  <?php if (isset($_GET['status']) && $_GET['status']==='success'): ?>
    <div class="msg success">Bedankt! Uw bericht is verzonden.</div>
  <?php elseif (isset($_GET['status']) && $_GET['status']==='error'): ?>
    <div class="msg error">Er ging iets mis. Probeer opnieuw of mail naar info@cc-it-solutions.be.</div>
  <?php endif; ?>
  <form action="contact.php" method="POST">
    <div class="form-row">
      <div>
        <label for="voornaam">Voornaam *</label>
        <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam" required>
      </div>
      <div>
        <label for="achternaam">Achternaam *</label>
        <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam" required>
      </div>
    </div>
    <label for="email">Email *</label>
    <input type="email" id="email" name="email" required>
    <label for="message">Bericht *</label>
    <textarea id="message" name="message" rows="5" maxlength="500" required></textarea>

    <div class="cf-turnstile" data-sitekey="<?= htmlspecialchars(getenv('CLOUDFLARE_TURNSTILE_SITE_KEY')) ?>"></div>

    <button type="submit">Verzend</button>
  </form>
</section>

<footer>
  <div class="footer-cols">
    <div>
      <h3>Adres</h3>
      <p>Alpacastraat 7</p>
      <p>9000 Gent</p>
      <p>België</p>
    </div>
    <div>
      <h3>Sociale Media</h3>
      <div class="social">
        <a href="https://www.linkedin.com/company/106003122" target="_blank" rel="noopener">LinkedIn</a>
        <a href="https://www.facebook.com/share/15uxVSuuGb/" target="_blank" rel="noopener">Facebook</a>
        <a href="https://www.instagram.com/ccitsolutions" target="_blank" rel="noopener">Instagram</a>
      </div>
    </div>
    <div>
      <h3>Bedrijfsinfo</h3>
      <p>Ondernemingsnummer: 1017.170.803</p>
      <p>IBAN: BE87 7390 2352 2194</p>
      <p>Deze onderneming valt onder de vrijstellingsregeling van kleine ondernemingen. BTW niet van toepassing.</p>
    </div>
  </div>
</footer>

</body>
</html>