var productBrandFilter = document.querySelectorAll('input[name="size"]');
var productBrandFilterLabel = document.querySelectorAll('.productBand');
function actionFilter(arrayFilter,arrayLabel) {
    arrayFilter.forEach(function (item, i) {
      item.onclick = function () {
        arrayLabel.forEach(function (item) {
          item.classList.remove('active');
        });
        arrayLabel[i].classList.add('active');
      };
    });
  }
  productBrandFilter ? actionFilter(productBrandFilter,productBrandFilterLabel):{};
