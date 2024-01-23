(function($) {
  'use strict';
  var form = $("#example-form");
  form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onFinished: function(event, currentIndex) {
      alert("Submitted!");
    }
  });
  var validationForm = $("#example-validation-form");
  validationForm.val({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      confirm: {
        equalTo: "#password"
      }
    }
  });
  validationForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
      validationForm.val({
        ignore: [":disabled", ":hidden"]
      })
      return validationForm.val();
    },
    onFinishing: function(event, currentIndex) {
      validationForm.val({
        ignore: [':disabled']
      })
      return validationForm.val();
    },
    onFinished: function(event, currentIndex) {
      alert("Submitted!");
    }
  });
  var verticalForm = $("#example-vertical-wizard");
  verticalForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    onFinished: function(event, currentIndex) {
      fetch("{{ route('users.store') }}", {
        method: "POST",
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        // Handle successful response
        alert("Form submitted successfully!");
        window.location.href = "{{route('users.index')}}";
      })
      .catch(error => {
        // Handle errors
        console.error(error);
        document.print("Error submitting form:", error);
      });

    }
  });
})(jQuery);
