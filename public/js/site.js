(function () {
  // Mobile navigation
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('.nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  // EMI calculator
  var calc = document.getElementById('emi-calc');
  if (calc) {
    var amount = calc.querySelector('[name=amount]');
    var rate = calc.querySelector('[name=rate]');
    var years = calc.querySelector('[name=years]');
    var fmt = new Intl.NumberFormat('en-IN', { maximumFractionDigits: 0 });

    var update = function () {
      var P = +amount.value, r = +rate.value / 12 / 100, n = +years.value * 12;
      var emi = r === 0 ? P / n : (P * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
      var total = emi * n;
      calc.querySelector('[data-out=amount]').textContent = fmt.format(P);
      calc.querySelector('[data-out=rate]').textContent = (+rate.value).toFixed(1) + '%';
      calc.querySelector('[data-out=years]').textContent = years.value + ' yrs';
      calc.querySelector('[data-res=emi]').textContent = fmt.format(emi);
      calc.querySelector('[data-res=interest]').textContent = fmt.format(total - P);
      calc.querySelector('[data-res=total]').textContent = fmt.format(total);
    };
    [amount, rate, years].forEach(function (el) { el.addEventListener('input', update); });
    update();
  }
})();

// Header border once the page scrolls
(function () {
  var h = document.querySelector('.site-header');
  if (!h) return;
  var on = function () { h.classList.toggle('scrolled', window.scrollY > 8); };
  on();
  window.addEventListener('scroll', on, { passive: true });
})();
