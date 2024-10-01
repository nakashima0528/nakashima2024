@extends('layouts.app')
@section('canonical', route('privacy'))
@section('title', 'Privacy Policy')
@section('body_class', 'privacy headerfix')
@section('ogp')
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="Privacy Policy | {{ config('const.site_title'); }}">
  <meta property="og:description" content="Guidance about Privacy Policy. {{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ route('privacy') }}">
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

      <li class="active">Privacy Policy</li>
    </ol>
@endsection

@section('content')
  <div class="wrap mt3 document">
    <h1><img src="/img/privacy.png" alt="Privacy Policy" class="documentKey01"></h1>

    <h2>Article 1: About JP CONCIERGE and passage LLC</h2>
    <ol>
      <li>JP CONCIERGE is a Japanese hospitality service operated by passage LLC (hereinafter referred to as 'the Company'). The Company is registered in Japan under the corporate number 3010403028626, with the registered office located at 6F Aoyama Marutake Building, 3-1-36 Minami Aoyama, Minato-ku Tokyo. The representative and person in charge of personal information management is Eri SETO.</li>
      <li>The Company acknowledges the utmost importance of compliance with laws, guidelines, and other norms related to the protection of personal information. To ensure the peace of mind for customers and business partners (hereinafter referred to as 'customers') using the Company's services, the organization prudently collects, uses, and manages such information within its operations.</li>
      <li>In light of this commitment, the Company establishes the JP CONCIERGE Privacy Policy. This Privacy Policy outlines the principles governing the collection, use, and management of personal information in connection with the operation of the website https://jpconcierge.com (the Site) and other business activities conducted by the Company.</li>
    </ol>

    <h2>Article 2: Information the Company may Collect</h2>
    <p>The Company has implemented appropriate security measures to prevent the accidental loss, unauthorized access, alteration, disclosure, or unlawful use of customers' personal information. Access to customers' personal information is limited to employees with a business need to know. The Company may collect and process the following data about customers:</p>
    <ol class="listSub">
      <li>Details of Transactions: Information about transactions customers carry out through the Site and the fulfillment of orders;</li>
      <li>Information from Forms: Data that customers provide by filling in forms on the Site, including but not limited to information provided when requesting or subscribing to any service, becoming a registered user, or participating in promotions sponsored by the Company;</li>
      <li>Survey Information: Data from surveys conducted by the Company for research purposes, provided customers choose to respond;</li>
      <li>Communications: Information included in communications sent by customers to the Company regarding the Site; </li>
      <li>Details of Site Visits: Information about customers' visits to the Site, including, but not limited to, traffic data, location data, and resources accessed.</li>
    </ol>

    <h2>Article 3: IP address and Cookies</h2>
    <ol>
      <li>The Company may collect information about computers accessing the Site, including, where available, IP address, operating system, and browser type. This information is gathered for system administration purposes and to generate aggregate statistics for advertisers. Such statistics represent browsing actions and patterns but do not identify any individual.</li>
      <li>The Company may obtain information about general internet usage by utilizing a cookie file stored on the hard drive of a computer. This helps the Company enhance the Site and provide a better and more personalized service. The information obtained allows the Company to:
        <ol>
          <li>Estimate audience size and usage patterns;</li>
          <li>Store information about customers' preferences, enabling customization of the Site based on individual interests;</li>
          <li>Accelerate search functionality;</li>
          <li>Recognize when customers return to the Site.</li>
        </ol>
      </li>
      <li>Customers have the option to configure their browser settings to allow or block cookies. However, if customers choose not to permit the use of cookies, certain parts of the Site may be inaccessible.</li>
    </ol>

    <h2>Article 4: How the Company Processes and Stores Personal Information</h2>
    <ol>
      <li>The data collected from customers is processed by staff working for the Company or its service providers. These staff members may be involved in various activities, including fulfilling orders, processing payment details, and providing support services.</li>
      <li>All information provided by customers is stored on secure servers. Any payment transactions are encrypted using Transport Security Layer (TSL) 1.3. If the Company has issued customers (or if customers have chosen) a password for accessing specific features or parts of the Site, customers are responsible for maintaining the confidentiality of the password and must not share it with anyone else.</li>
      <li>During the checkout process, all data related to orders and customers' personal information is transmitted to servers in encrypted form. The system is designed to ensure customers are always in secure mode (https) while using the Site, providing an additional layer of protection.</li>
      <li>Payment transactions are processed on behalf of the Company by third-party payment providers. This means that customers' financial information for transaction settlement is directly provided to chosen payment providers and is never disclosed to the Company. The payment providers operate secure servers to process and authorize payments in encrypted form.</li>
    </ol>

    <h2>Article 5: Use of Personal Information</h2>
    <ol>
      <li>To fulfill obligations arising from contracts between customers and the Company, and specifically to fulfill customer orders, the Company may share information about customers with sub-contractors, including delivery service providers. Depending on the requirements of individual orders, these third parties may be based and/or operate outside of Japan.</li>
      <li>In addition, the Company utilizes information about customers as follows: 
        <ol>
          <li>To provide customers with information, products, or services requested from the Company, or that the Company believes may be of interest to customers. This may include contacting customers by post, email, SMS, or other means of electronic communication, as indicated by customers' preferences;</li>
          <li>To ensure that content from the Site is presented in the most effective manner for customers;</li>
          <li>To allow customers to participate in any interactive features of services, when customers choose to do so;</li>
          <li>To notify customers about changes to services.</li>
        </ol>
      </li>
      <li>The Company implements appropriate measures to protect personal information in accordance with laws and regulations related to the protection of personal information. Personal information, in a personally identifiable form, will not be disclosed or provided to a third party without individual consent, except as permitted by laws and regulations pertaining to the protection of personal information.</li>
    </ol>

    <h2>Article 6: Provision of Information to Third Parties</h2>
    <p>The Company is not responsible for the use of personal information that is collected independently at websites linked from the Site, such as websites and services of third parties that can be accessed through the Site. Therefore, the Company accepts no liability or responsibility for the independent provisions and activities of the websites or companies. The Company advises customers to read each privacy policy of the websites.</p>

    <h2>Article 7: Rights Regarding Personal Information</h2>
    <ol>
      <li>The Company will respond to individual requests regarding personal information, including but not limited to disclosure, correction, addition, deletion, suspension of use, elimination, suspension of provision to third parties, notification of purpose of use, withdrawal of consent (where applicable), and disclosure of third-party records, in accordance with laws and regulations related to the protection of personal information. However, if a request does not meet the requirements outlined in laws and regulations related to the protection of personal information, the Company may not respond to the request.</li>
      <li>When making a request for disclosure, correction, addition, deletion, suspension of use, elimination, or suspension of provision to third parties of personal information, or any other requests, individuals should complete the specified request form following the procedures separately outlined by the Company and send it by mail. In the case of a written request for disclosure, the Company will charge a prescribed handling fee and document delivery postage (if applicable). For additional information, opinions, complaints, and objections related to the Privacy Policy, individuals can communicate with the Company via CONTACT JP CONCIERGE after signing in.</li>
    </ol>

    <h2>Article 8: Compliance with Laws and Regulations Pertaining to the Protection of Personal Information</h2>
    <p>The Company reserves the right to revise the Privacy Policy in response to changes in laws and regulations related to the protection of personal information or as necessary to enhance the protection of personal information. In such instances, the Company will post the updated Privacy Policy.</p>

    <p class="mt3">1st Oct. 2020 established</p>
    <p>1st Apr. 2022 updated</p>
    <p>3rd Oct. 2022 updated</p>
    <p>22nd Jan 2024 updated</p>

  </div>
@endsection
