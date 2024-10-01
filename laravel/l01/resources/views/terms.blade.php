@extends('layouts.app')
@section('canonical', route('terms'))
@section('title', 'Terms of service')
@section('body_class', 'terms headerfix')
@section('ogp')
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="Terms of service | {{ config('const.site_title'); }}">
  <meta property="og:description" content="Guidance about Terms of service. {{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ route('terms') }}">
  <meta property="og:image" content="{{ config('const.site_url') }}/img/ogp.png">
  <meta name="twitter:card" content="summary_large_image">
@endsection

@section('breadcrumb')

    <ol class="breadcrumb">
@auth
      <li><a href="{{ route('home') }}">MYPAGE TOP</a></li>

@else

      <li><a href="/">TOP</a></li>
@endauth

      <li class="active">Terms of service</li>
    </ol>
@endsection

@section('content')

  <div class="wrap mt3 document">
    <h1><img src="/img/terms.png" alt="Terms of service" class="documentKey02"></h1>

    <p class="mt2">Welcome to JP CONCIERGE, provided by passage LLC. These Terms of Service (hereinafter referred to as 'the Terms') outline the conditions governing the utilization of our shipping concierge and personal concierge services (hereinafter referred to as 'the Service') offered to our esteemed customers. By engaging with our services, you implicitly agree to adhere to these Terms. Please review the following terms attentively before proceeding. If you disagree with any part of these Terms, we regret to inform you that you may not avail yourself of the Service.</p>

    <h2>Article 1: Individual Membership</h2>
    <ol>
      <li>An individual membership is extended to anyone who accepts the Terms and its privacy policy, completes an online registration form, and is issued an account ID (hereinafter referred to as ‘account owner(s)’) by the Company. The account owner must refrain from allowing any third party to use, lend, transfer, sell, or pledge the account ID.</li>
      <li>Individual membership can be terminated by the account owner following the procedures stipulated by the Company.</li>
    </ol>

    <h2>Article 2: Account Application</h2>
    <ol>
      <li>Prospective customers seeking individual membership must personally complete the online registration form. If the prospective customer is a minor, the Company shall seek the consent of a parent or guardian.</li>
      <li>The online registration procedure is considered complete only upon approval by the Company. The Company reserves the right to decline or revoke individual membership for various reasons, including but not limited to:
        <ol>
          <li>Lack of parental consent for minors;</li>
          <li>Previous breaches of the Terms;</li>
          <li>Provision of untrue, incorrect, or incomplete details;</li>
          <li>Failure to make payment of outstanding obligations;</li>
          <li>Conduct interfering with the operation of the Company;</li>
          <li>Any other conduct deemed inappropriate by the Company.</li>
        </ol>
      </li>
    </ol>

    <h2>Article 3: Account ID and Password Management</h2>
    <ol>
      <li>The account ID and password provided by the Company during online registration or via the website https://jpconcierge.com (the Site) must be handled responsibly by the account owner.</li>
      <li>The account owner is solely responsible for any losses or damages arising from inadequate management practices, such as irregular password changes, improper usage, or unauthorized third-party access to the account ID and password. In such instances, the Company bears no liability, and all actions performed using the account ID and password are attributed to and the responsibility of the account owner.</li>
      <li> If there is any suspicion that the account ID or password has been disclosed to a third party, or there exists a risk of unauthorized use, the account owner must promptly inform the Company and follow the Company's instructions. Any losses or damages suffered by the Company due to unauthorized usage will require compensation from the relevant account owner.</li>
      <li>Replacement of account IDs and passwords will be considered only if expressly approved by the Company. Unauthorized issuance of replacement account IDs and passwords is strictly prohibited.</li>
    </ol>

    <h2>Article 4: Changes to Details Provided by the Account Owner</h2>
    <ol>
      <li>In the event of any changes to the details provided to the Company on the registration form, the account owner shall promptly notify the Company via CONTACT JP CONCIERGE after signing in.</li>
      <li>All correspondences dispatched by the Company to the contact information indicated in the details provided upon registration shall be deemed to have reached the relevant account owner on schedule.</li>
    </ol>

    <h2>Article 5: Handling of Personal Data</h2>
    <ol>
      <li>The Company shall exclusively utilize customers' personal data for the following purposes:
        <ol>
          <li>Individual membership administration;</li>
          <li>Selling or providing products, rights, digital content, services, or financial products (hereinafter referred to as ‘products and other services’) offered by the Company or a third party;</li>
          <li>Conducting promotions, giveaways, or surveys;</li>
          <li>Notifying customers of important matters related to the operation of online services, including via email;</li>
          <li>Advertising, promoting, or soliciting sales of products and other services offered by the Company or a third party, including via email;</li>
          <li>Sending out email newsletters;</li>
          <li>Packaging and shipping products;</li>
          <li>Invoicing;</li>
          <li>Dealing with inquiries and providing after-sales services;</li>
          <li>Conducting research and analysis on marketing data and developing new services;</li>
          <li>Compiling statistics and other data for provision to partner companies specified by the Company (hereinafter referred to as ‘business partner’);</li>
          <li>Exercise of rights and performance of obligations based on contracts, laws, etc.</li>
        </ol>
      </li>
      <li>In accordance with its privacy policy, the Company shall ensure the adequate protection of personal data, and no personal data shall be provided to third parties in a format that can identify individuals. However, the Company shall be entitled to provide personal data under any of the following circumstances:
        <ol>
          <li>If the account owner has given consent;</li>
          <li>If the disclosure of data is required by law or as part of a criminal investigation or other legal process or if a legitimate information request is received from public authorities;</li>
          <li>If forwarding order details to a business partner;</li>
          <li>If disclosing data to a business partner in the event that a customer has purchased or is attempting to purchase a product or other service from the relevant business partner;</li>
          <li>If necessary, in order to ship products or provide services;</li>
          <li>If disclosing data to a payment service provider;</li>
          <li>If outsourcing all or part of the Company's operations to a third party;</li>
          <li>If disclosing to the successor of the business in the event of business succession due to merger, business transfer or other reasons;</li>
          <li>If required in accordance with the Personal Information Protection Law or other applicable laws and regulations;</li>
          <li>The Company may use cookies when customers use the Service in some cases.</li>
       </ol>
      </li>
    </ol>

    <h2>Article 6: Suspension or Termination of Individual Membership</h2>
    <p>The Company reserves the right to temporarily suspend or terminate individual membership without prior notice or warning, based on the following circumstances:</p>
    <ol class="listSub">
      <li>Unauthorized usage of the account ID or password to access the Service, or if the account owner allows such actions to occur;</li>
      <li>Failure to make payment of charges by the specified date;</li>
      <li>Initiation of legal actions against the account owner, including, but not limited to, seizure, provisional seizure, provisional injunction, compulsory execution, bankruptcy, civil rehabilitation, etc., or if the account owner initiates such legal proceedings;</li>
      <li>Incorrect entry of the password by the account owner on more occasions than permitted by the Company;</li>
      <li>Non-usage of the Service by the account owner for a period specified by the Company;</li>
      <li>Breach of other provisions outlined in the Terms;</li>
      <li>Deemed ineligibility for individual membership by the Company for any other reason.</li>
    </ol>

    <h2>Article 7: Shipping Concierge Service Overview</h2>
    <ol>
      <li>The Service encompasses transit services facilitating the delivery of merchandise purchased by the account owner from domestic retailers, whether online or via mail order. These items are sent to the Company and subsequently shipped to the recipient.</li>
      <li>The Company, in the preceding paragraph, is not party to the product sales agreements with retailers. Consequently, the Company reserves no liability for issues related to the product, such as defects or intellectual property violations. This exemption doesn't apply if the account owner can prove that the product was lost or damaged while in the Company's care.</li>
      <li>The Company is not involved in product delivery agreements with carriers, absolving itself of liability for losses or damage due to non-delivery, late delivery, breakages, or any other delivery-related issues. Account owners authorize the Company to conclude the delivery contract in their name.</li>
      <li>Terms and conditions for eligible retailers, carriers, and products under the Service are restricted to the scope specified by the Company. Customers must not utilize the Service beyond the specified scope.</li>
    </ol>

    <h2>Article 8: Personal Concierge Service Overview</h2>
    <ol>
      <li>Requests for the Personal Concierge Service, including proxy purchases and other arrangements, must adhere to the Company's stipulated method.</li>
      <li>The Company purchases products on behalf of the account owner upon confirmation of the arrangement request.</li>
      <li>Once a request for proxy purchase is made, the account owner cannot cancel it without the Company's consent, even without a concluded delegation contract.</li>
      <li>The Company reserves the discretion to consent or decline requests made by account owners.</li>
      <li>Redeemable points from retailers, if applicable in proxy purchases, will be retained by the Company.</li>
      <li>The delivery of the product between the recipient and the Company is completed upon shipment from the Company.</li>
      <li>Account owners are responsible for expenses related to proxy purchases and product delivery (collectively referred to as ‘product charges’). This includes shipping fees, transfer fees, taxes, customs duties, overseas shipping costs, other expenses, and Service usage fees.</li>
      <li>The account owner must pay the Company the posted fee before making arrangements. The Company reserves the right to change usage fees without prior notice.</li>
      <li>In the event that the Company cannot procure a requested product due to factors such as shortages, the Company may invoice the account owner. The invoiced amount will be determined by subtracting the product price from the Service-indicated charge. For auction products, if the bidding price presented by the Service is lower than the successful bid price, the Company reserves the right to claim either the successful bid price or the product price from the account owner.</li>
      <li>Payment of product charges must be made by the date specified by the Company through the agreed-upon method.</li>
      <li>Rights generated based on the contract with the Company cannot be transferred, used as collateral, or disposed of by the account owner.</li>
      <li>Failure to pay product charges may result in contract cancellation by the Company, with the right to claim compensation for damages.</li>
      <li>If the Company encounters situations outlined in Article 13 of the Terms, it may cancel the contract without notice.</li>
      <li>Contract cancellation by the Company post-purchase does not warrant a refund of the product price to the account owner.</li>
      <li>If the account owner refuses a product as part of the Service, the Company may, at its discretion, sell, discard, return, or dispose of the product received from the retailer, and no objections will be entertained.</li>
    </ol>

    <h2>Article 9: Excluded Goods and Services</h2>
    <p>Customers are prohibited from using the Service for the following:</p>
    <ol class="listSub">
      <li>Cash, checks, bills, shares, or other securities (including cash vouchers for airline tickets and concert tickets);</li>
      <li>Credit cards, ATM cards, etc.;</li>
      <li>Savings/deposit books or withdrawal cards issued by a financial institution;</li>
      <li>Items lacking a clearly visible company name or written indication addressed to the Company;</li>
      <li>Perishable items such as food, drink, or others susceptible to deterioration;</li>
      <li>Items acquired through illegal, fraudulent, unjust, or other dishonest means;</li>
      <li>Items prohibited or restricted by the laws of importing or exporting countries, state or local governments (including intermediate countries);</li>
      <li>Items not authorized under the carrier's shipping terms;</li>
      <li>Items or services deemed inappropriate by the Company.</li>
    </ol>

    <h2>Article 10: Service Charges and Payment</h2>
    <ol>
      <li>Charges for utilizing the Service are as specified on the Service fee table and are subject to potential revisions by the Company without prior notice. The standard product weights used for the Service fee table are determined based on measurements conducted by the Company.</li>
      <li>The account owner is responsible for covering customs clearance and other shipping charges (referred to as ‘additional charges’) associated with the itinerary accompanying the shipment from the Company to the recipient. The Company reserves no obligation to pay additional charges on behalf of the account owner or the recipient.</li>
      <li>The account owner must fulfill payment for all service charges as per the instructions provided, and this payment should be made no later than the date specified by the Company.</li>
    </ol>

    <h2>Article 11: Communication Regarding Product Orders</h2>
    <p>The account owner is obligated to promptly notify the Company of accurate information immediately after purchasing a product. This ensures the provision of correct details essential for the proper delivery of the product to the intended recipient.</p>

    <h2>Article 12: Inspections</h2>
    <ol>
      <li>The Company reserves the right to open and inspect the contents of the product parcel. However, it's important to note that while the Company may conduct such inspections, the results do not serve as a guarantee regarding the quality of the respective product, the presence or absence of defects, authenticity, or compliance with applicable legislation in the country of origin, destination, or intermediate countries.</li>
      <li>In cases where an inspection reveals items in violation of or suspected to be in violation of the Law for Prevention of Transfer of Criminal Proceeds or other relevant legislation, the Company may take appropriate actions, including notifying law enforcement agencies or surrendering the items in question.</li>
      <li>The Company shall not be held accountable for any damages incurred by the account owner due to product inspections or any other actions outlined in this article.</li>
    </ol>

    <h2>Article 13: Refusal to Provide the Service</h2>
    <p>In the event that any of the following conditions apply or are suspected to apply, the Company retains the right to refuse the provision of the Service, even if the usage of the Service has been previously approved:</p>
    <ol class="listSub">
      <li>If the product in question is listed under Article 9;</li>
      <li>If it is impossible to verify the recipient's address;</li>
      <li>If the information about the parcel received by the Company differs from the shipping address on My Account available on the Site;</li>
      <li>If purchased using a payment method that the Company cannot accommodate, such as cash on delivery;</li>
      <li>If the account owner rejects the product;</li>
      <li>If the carrier refuses to deliver the product;</li>
      <li>In the absence of notification in accordance with Article 11;</li>
      <li>If the product details provided by the account owner via notification in accordance with Article 11 do not align with the product received by the Company, or if the relevant notification is inaccurate;</li>
      <li>If the product is seized by customs;</li>
      <li>If the account owner fails to make payment of service charges;</li>
      <li>If the account owner breaches the Terms;</li>
      <li>If the provision of the Service is deemed inappropriate by the Company for any other reason.</li>
    </ol>

    <h2>Article 14: Disposal of Undeliverable Items</h2>
    <ol>
      <li>The Company reserves the right to promptly dispose of items outlined in Article 9 upon receipt.</li>
      <li>If any of the grounds specified in the previous article are applicable (excluding a)), and the Company has already received the relevant product, it will be retained for a period of 50 days from the date of receipt.</li>
      <li>Should all grounds stipulated in the preceding article be resolved within the outlined period, the account owner may instruct the Company to ship the relevant product to the designated shipping address.</li>
      <li>If all grounds stipulated in the preceding article are not resolved within the specified period in paragraph 2, the Company may proceed to sell or dispose of such items.</li>
      <li>In the event of the sale of the relevant product as described in the preceding paragraph, the proceeds may be utilized to cover storage and disposal costs, service fees, and other associated expenses.</li>
      <li>If there is an outstanding amount after the disposal of the product according to the preceding paragraph, the Company shall transfer the relevant amount to an account designated by the account owner within 25 days of the finalization date or the date when the account owner designates an account, whichever is later. The transfer fee shall be borne by the account owner.</li>
      <li>The outstanding amount, as described in the preceding paragraph, shall be interest-free.</li>
      <li>The Company assumes no liability for any losses or damages sustained by account owners resulting from the disposal of products as outlined in this article.</li>
      <li>Notwithstanding the provisions of this Article, the Company may initiate legal proceedings under the Civil Execution Law.</li>
    </ol>

    <h2>Article 15: Changes to or Suspension of the Service </h2>
    <ol>
      <li>The Company reserves the right to change or suspend all or part of the Service without prior notice to customers if any of the following conditions apply:
        <ol>
          <li>Equipment or systems used for Service provision are undergoing maintenance or replacement;</li>
          <li>The Service cannot be provided due to factors such as fire, power outage, natural disaster, system failure, or any other reason;</li>
          <li>Telecommunications carriers are unable to provide essential services;</li>
          <li>The Company deems it necessary to change or suspend the Service for any other reason.</li>
        </ol>
      </li>
      <li>The Company disclaims any liability for any disadvantages, losses, or damages experienced by customers resulting from changes to or the suspension of the provision of the Service.</li>
    </ol>

    <h2>Article 16: Prohibited Conduct</h2>
    <ol>
      <li>Any individual shall not engage in any of the following forms of conduct or any form of conduct that could potentially be regarded as such when using the Service:
        <ol>
          <li>Unauthorized use of the Service;</li>
          <li>Infringement upon intellectual property rights (trademark rights, copyrights, design rights, patent rights, etc.), portrait rights, publicity rights, or any other rights belonging to the Company or a third party;</li>
          <li>Engagement in conduct linked to fraud or other criminal activities;</li>
          <li>Impersonating a third party to use the Service;</li>
          <li>Unauthorized use of facilities belonging to the Company or a third party, or any action that impedes their operation;</li>
          <li>Violation of the law, violation of the Terms, or causing offense to public order and morals;</li>
          <li>Interfering with the normal operation of the Service;</li>
          <li>Using the information provided by the Company as the delivery address for the product for purposes other than delivery;</li>
          <li>Any other conduct deemed inappropriate by the Company.</li>
        </ol>
      </li>
      <li>In the event of an individual violating the Terms, resulting in losses or damage to the Company, the Company reserves the right to claim compensation against the relevant individual accordingly.</li>
    </ol>

    <h2>Article 17: Prevention of Involvement with Anti-Social Forces</h2>
    <ol>
      <li>Account owners, during online registration, shall represent that they do not fall under any of the following categories and promise not to fall under the same in the future:
        <ol>
          <li>An organized criminal group;</li>
          <li>An account owner of an organized crime group;</li>
          <li>An associate member of an organized crime group;</li>
          <li>An affiliate of an organized crime group;</li>
          <li>A professional troublemaker at stockowners' meetings, etc., a racketeer, etc. engaged in a social movement, or a crime group specialized in intellectual crimes;</li>
          <li>A person having a social or economic relationship with any person falling under any of Items a) through Item e) of this paragraph;</li>
          <li>Otherwise, a person equivalent to any of the preceding items.</li>
        </ol>
      </li>
      <li>Individuals shall commit not to engage in any of the following acts:
        <ol>
          <li>Making violent demands;</li>
          <li>Making unreasonable demands exceeding lawful responsibility;</li>
          <li>Damaging the credibility of the other party or interfering with their business by using fraudulent means or force in relation to transactions;</li>
          <li>Otherwise, any act equivalent to any of the preceding items.</li>
        </ol>
      </li>
      <li>If an individual falls under any of the categories in paragraph 1, performs any act described in paragraph 1, or if it is discovered that an individual has made a false declaration concerning the representation and promise pursuant to the provisions of paragraph 1, the Company reserves the right to terminate the contract with such individuals.</li>
    </ol>

    <h2>Article 18: Amendments to Terms of Service</h2>
    <p>The Company reserves the right to modify the Terms without prior notice. In the event of any revisions, all aspects pertaining to the Service shall be governed by the updated terms.</p>

    <h2>Article 19: Applicable Law and Jurisdiction</h2>
    <ol>
      <li>The Terms shall be governed by and construed in accordance with Japanese law.</li>
      <li>In the event of any dispute arising from or related to the Terms, the exclusive and primary jurisdiction shall be vested in the Tokyo District Court.</li>
    </ol>

    <p class="mt3">1st Oct. 2020 established</p>
    <p>3rd Oct. 2022 updated</p>
    <p>22nd Jan. 2024 updated</p>

  </div>
@endsection
