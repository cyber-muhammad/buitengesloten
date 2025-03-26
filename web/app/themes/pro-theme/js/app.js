document.getElementById('burger-menu').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
});

document.getElementById('close-menu').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
});

function triggerCallClick(element) {
    const link = element.querySelector('a');
    if (link) {
        link.click();
    }
}

function gtag_report_conversion(url) {
    var callback = function () {
      if (typeof(url) != 'undefined') {
        window.location = url;
      }
    };
    gtag('event', 'conversion', {
        'send_to': 'AW-11307781035/49y4CNP_89UYEKuX_I8q',
        'event_callback': callback
    });
    return false;
}

function toggleProvinceContent(provinceId) {
    const content = document.getElementById('content-' + provinceId);
    const toggle = document.getElementById('toggle-' + provinceId);
    
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
        toggle.classList.remove('active');
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
        toggle.classList.add('active');
    }
}