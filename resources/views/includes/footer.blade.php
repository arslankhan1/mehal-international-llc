 <!-- Newsletter Section -->
 <section class="newsletter-section mt-5">
     <div class="container">
         <div class="newsletter-content">
             <h2>Subscribe to our emails</h2>
             <p>Subscribe to our mailing list for news, new brands, and partnership opportunities.</p>
             <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                 @csrf
                 <div class="newsletter-input-group">
                     <input type="email" name="email" placeholder="Email" required>
                     <button type="submit">→</button>
                 </div>
             </form>
         </div>
     </div>
 </section>

 <!-- Footer -->
 <footer class="site-footer">
     <div class="container">
         <div class="footer-content">
             <div class="footer-section">
                 <h3 class="main-heading">GET IN TOUCH</h3>
                 <p><span class="heading">EMAIL: </span> <a
                         href="mailto:Customerservice@mehalintl.com">Customerservice@mehalintl.com</a></p>
                 <p><strong class="heading">Phone: </strong> <a href="tel:(469)767-7626">(469) 767-7626</a></p>
                 <p>COPYRIGHT ©2023 Mehal International LLC., All Rights Reserved</p>

             </div>
         </div>
         <div class="footer-bottom">
             <div class="payment-icons">
                 <span><svg class="icon icon--full-color" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg"
                         width="38" height="24" role="img" aria-labelledby="pi-paypal">
                         <title id="pi-paypal">PayPal</title>
                         <path opacity=".07"
                             d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                         </path>
                         <path fill="#fff"
                             d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"></path>
                         <path fill="#003087"
                             d="M23.9 8.3c.2-1 0-1.7-.6-2.3-.6-.7-1.7-1-3.1-1h-4.1c-.3 0-.5.2-.6.5L14 15.6c0 .2.1.4.3.4H17l.4-3.4 1.8-2.2 4.7-2.1z">
                         </path>
                         <path fill="#3086C8"
                             d="M23.9 8.3l-.2.2c-.5 2.8-2.2 3.8-4.6 3.8H18c-.3 0-.5.2-.6.5l-.6 3.9-.2 1c0 .2.1.4.3.4H19c.3 0 .5-.2.5-.4v-.1l.4-2.4v-.1c0-.2.3-.4.5-.4h.3c2.1 0 3.7-.8 4.1-3.2.2-1 .1-1.8-.4-2.4-.1-.5-.3-.7-.5-.8z">
                         </path>
                         <path fill="#012169"
                             d="M23.3 8.1c-.1-.1-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.3-.1-.7-.1-1.1-.1h-3c-.1 0-.2 0-.2.1-.2.1-.3.2-.3.4l-.7 4.4v.1c0-.3.3-.5.6-.5h1.3c2.5 0 4.1-1 4.6-3.8v-.2c-.1-.1-.3-.2-.5-.2h-.1z">
                         </path>
                     </svg></span>
                 <span><svg class="icon icon--full-color" viewBox="0 0 38 24" width="38" height="24"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="pi-venmo">
                         <title id="pi-venmo">Venmo</title>
                         <g fill="none" fill-rule="evenodd">
                             <rect fill-opacity=".07" fill="#000" width="38" height="24" rx="3">
                             </rect>
                             <path fill="#3D95CE"
                                 d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                             </path>
                             <path
                                 d="M24.675 8.36c0 3.064-2.557 7.045-4.633 9.84h-4.74L13.4 6.57l4.151-.402 1.005 8.275c.94-1.566 2.099-4.025 2.099-5.702 0-.918-.154-1.543-.394-2.058l3.78-.783c.437.738.634 1.499.634 2.46z"
                                 fill="#FFF" fill-rule="nonzero"></path>
                         </g>
                     </svg></span>
             </div>
             <p class="copyright-year">© 2026, <a href="/">Mehal International LLC.</a></p>
         </div>
     </div>
 </footer>
