          <form class="form">
             <div class="form__fields">
                <div class="form__field form__field--name">
                   <input type="text" name="name" placeholder="Your Name*:">
                   <span class="error" id="nameError"></span>
                </div>

                <div class="form__field form__field--mail">
                   <input type="email" name="email" placeholder="Your Email*:">
                   <span class="error" id="emailError"></span>
                </div>

                <div class="form__field form__field--message">
                   <textarea type="message" name="message" placeholder="Message:"></textarea>
                </div>

                <button class="form__btn btn btn-reset"><?php echo esc_html('Submit'); ?></button>
             </div>

             <div class="form__result is-hidden">
                <p class="form__result-text"></p>
             </div>
          </form>