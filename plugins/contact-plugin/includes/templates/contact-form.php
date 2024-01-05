<div style="width:fit-content; margin-left:auto;margin-right: auto;">
    <form id="enquiry_form">
        <label for="name">Name</label>
        <input type="text" name="name"></br>
        <label for="email">Email</label>
        <input type="email" name="email"></br>
        <label for="phone">Phone</label>
        <input type="text" name="phone"></br>
        <label for="message">Your Message</label>
        <textarea name="message"></textarea></br>
        <button type="submit">Submit form</button>

    </form>
</div>

<script>

    jQuery(document).ready(($) => {
        $('#enquiry_form').submit((e) => {
            e.preventDefault(); // prevent default form submission
            console.log("Form submitted!");
            // Add your form submission logic here
        });
    });


</script>