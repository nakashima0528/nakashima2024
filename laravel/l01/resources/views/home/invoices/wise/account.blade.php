          <p class="mt3">If payment has not been made, kindly log in to 'Wise' and send Japanese Yen using the following information.<br><br>A helpful tip: When Wise prompts you with 'Who are you sending money to?', please select 'Someone else' and enter 'team-bravo@jpconcierge.com' to proceed.</p>
          <div class="parcelBox mt1">
          <dl class="parcelDl">
              <dt><h3>Email</h3></dt>
              <dd>
                <p><span>team-bravo@jpconcierge.com</p>
              </dd>
            </dl>
            <dl class="parcelDl">
              <dt><h3>Full name of the account holder</h3></dt>
              <dd>
                <p><span>パッセージ(ド</p>
              </dd>
            </dl>
            <dl class="parcelDl">
              <dt><h3>Recipient's preferred language</h3></dt>
              <dd>
                <p><span>English</p>
              </dd>
            </dl>
            <dl class="parcelDl">
              <dt><h3>Total payment</h3></dt>
              <dd>
                <p><span>{{ number_format(Helper::getTotlePayment($invoice->invoiceDetails)) }} JPY</p>
              </dd>
            </dl>
          </div>
