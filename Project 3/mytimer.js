const startTimer = (duration, display)=> {
  var start = Date.now(),
      remainingTime,
      minutes,
      seconds;
  const timer = ()=> {
      remainingTime = duration - (((Date.now() - start) / 1000) | 0);

      minutes = (remainingTime / 60) | 0;
      seconds = (remainingTime % 60) | 0;

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds; 

      if (remainingTime <= 0) {
          start = Date.now() + 1000;
      }
  };
  timer();
  setInterval(timer, 1000);
}

window.onload = function () {
  var Minutes = 60 * 5,
      display = document.querySelector('#timer');
  startTimer(Minutes, display);
};