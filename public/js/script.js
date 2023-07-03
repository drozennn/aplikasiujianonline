const hitungMundur = setInterval(() => {
  const over = document.querySelector("#selesai").textContent;
  const now = new Date().getTime();
  const countdown = document.querySelector("#countdown");

  const selisih = Math.floor(over - now) / 1000;
  const jam = Math.floor(selisih / (60 * 60));
  const menit = Math.floor((selisih % (60 * 60)) / 60);
  const detik = Math.floor(selisih % 60);

  // Mengubah nilai pada elemen <span>
  countdown.children[0].style.setProperty("--value", jam);
  countdown.children[1].style.setProperty("--value", menit);
  countdown.children[2].style.setProperty("--value", detik);

  if (selisih <= 0) {
    clearInterval(hitungMundur);
    window.location.href = "/saveJawaban";
  }
}, 1000);
