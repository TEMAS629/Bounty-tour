

document.querySelector('.burger.open_menu').addEventListener('click', function () {
    var menu = document.querySelector('#mobile-mnu');
    menu.classList.toggle('open'); // Тoggles the 'open' class
});

document.getElementById('close-mnu').addEventListener('click', function () {
    var mobileMenu = document.getElementById('mobile-mnu');
    mobileMenu.classList.remove('open'); // Удаляем класс 'open'
});

// burgerMenu.addEventListener('click', function(event) {
//     event.preventDefault(); // Предотвращаем стандартное поведение ссылки
//     toggleMobileMenu();
// });

// // Если пользователь вошел в систему, меняем логику открытия меню
// if (typeof(Storage)!== 'undefined' && localStorage.getItem('phone')) {
//     console.log('User is logged in');
//     // Здесь можно добавить специфичную для пользователя логику, например, изменить стили или поведение меню
// }

  // (document).scroll(function () {
  //   if ((this).scrollTop() >= 50) {
  //     ("#header").addClass("painted");
  //     console.log('scroll')
  //   } else {
  //     ("#header").removeClass("painted");
  //   }
  // });

  document.addEventListener('DOMContentLoaded', function() {
    var header = document.getElementById('header');

    function checkScrollPosition() {
        if (window.pageYOffset > 50) {
            header.classList.add('painted');
        } else {
            header.classList.remove('painted');
        }
    }

    // Listen for the scroll event
    window.addEventListener('scroll', checkScrollPosition);
});

document.addEventListener('DOMContentLoaded', function() {
  var fancyboxInstance = new FancyBox(document.querySelectorAll('.fancybox'), {
      baseClass: 'myFancybox',
      touch: {
          verticalWheelEnabled: true,
      },
      afterShow: function(instance, current) {
          var $current = instance.content;
          var imgWidth = $current.offsetWidth;
          var imgHeight = $current.offsetHeight;

          // Центрирование изображения
          var topOffset = ((window.innerHeight || document.documentElement.clientHeight) - imgHeight) / 2;
          var leftOffset = ((window.innerWidth || document.documentElement.clientWidth) - imgWidth) / 2;

          $current.style.top = topOffset + 'px';
          $current.style.left = leftOffset + 'px';

          // Добавление кнопки закрытия
          var closeButton = document.createElement('button');
          closeButton.className = 'close';
          closeButton.textContent = 'Close';
          $current.appendChild(closeButton);
          closeButton.onclick = function() {
              FancyBox.getInstance().hide();
          };
      },
      openEffect: 'elastic',
      closeEffect: 'elastic'
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.info_tour_tabs .tab');
  const contents = document.querySelectorAll('.tabs_holder .content');

  // По умолчанию делаем первый таб активным и показываем его контент
  tabs[0].classList.add('active');
  contents[0].classList.add('active');

  tabs.forEach((tab, index) => {
      tab.addEventListener('click', function() {
          // Убираем класс 'active' со всех вкладок и контентов
          tabs.forEach(tab => tab.classList.remove('active'));
          contents.forEach(content => content.classList.remove('active'));

          // Добавляем класс 'active' к нажатой вкладке и соответствующему контенту
          this.classList.add('active');
          contents[index].classList.add('active');
          
          // Скрываем все контенты, кроме активного
          Array.from(contents).forEach(content => {
              if (!content.classList.contains('active')) {
                  content.classList.add('hidden');
              } else {
                  content.classList.remove('hidden');
              }
          });
      });
  });
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input[type="text"], input[type="select"]');

    function validateForm() {
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }

            switch (input.name) {
                case 'date_birth':
                case 'document_issue_date':
                    const dateRegEx = /^\d{2}\.\d{2}\.\d{4}$/;
                    if (!dateRegEx.test(input.value)) {
                        isValid = false;
                        input.setCustomValidity('Введите дату в формате DD.MM.YYYY');
                    } else {
                        input.setCustomValidity('');
                    }
                    break;
                case 'document_series':
                    const seriesRegEx = /^\d{3}$/;
                    if (!seriesRegEx.test(input.value)) {
                        isValid = false;
                        input.setCustomValidity('Серия документа должна состоять из 3 цифр');
                    } else {
                        input.setCustomValidity('');
                    }
                    break;
                default:
                    break;
            }
        });

        return isValid;
    }

    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
            alert('Заполните форму правильно.');
        }
    });
});




