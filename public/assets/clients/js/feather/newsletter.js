var firstTime = localStorage.getItem("first_time");
if (!firstTime) {
    $(window).on('load', function () {
        setTimeout(function () {
            $('#newsletter').modal('show');
        }, 500);
    });
    localStorage.setItem("first_time", "1");
}

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}