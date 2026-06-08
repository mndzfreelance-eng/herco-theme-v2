/**
 * Site copy — keep in sync with ../content/site-content.json
 */
window.HERCO_SITE = {
  "hero": {
    "badge": "Trusted Hardware Distributor since 1908",
    "title": "Built on Trust.<br><em>Delivering</em> Quality.",
    "desc": "Herco Trading is the Philippines' most established distributor of industrial tools, hardware, and 50+ global brands. Nationwide reach. Century of excellence."
  },
  "formPages": {
    "request-quote": {
      "title": "Request a Quotation",
      "label": "Sales",
      "intro": "Get pricing for bulk orders or specific product inquiries. Fill out the form below and our sales team will respond within 1–2 business days.",
      "submit": "Send Quote Request"
    },
    "schedule-a-call": {
      "title": "Schedule a Call",
      "label": "Consultation",
      "intro": "Book a consultation with our business development team. Let us know your preferred date and what you'd like to discuss.",
      "submit": "Request a Call"
    }
  },
  "brandsPage": {
    "title": "Our Principals",
    "intro": "We offer an extensive range of high-quality hardware products sourced from renowned international brands and world-class manufacturers. Our strong global supplier network allows us to consistently deliver premium tools, equipment, and home improvement solutions to customers across the Philippines. In addition to hardware distribution, HERCO TRADING is strategically connected with some of the country's leading companies in plastic product manufacturing, consumer chemical production, and financial services—enabling us to create greater value and drive growth across multiple industries."
  },
  "brandsFallback": ["BOSCH","DEWALT","STANLEY","3M","WD-40","YALE","IRWIN","BLACK+DECKER","BAHCO","DEVCON","OXO","BONDHUS","DORMA","BRIGGS & STRATTON","ARMOR ALL"],
  "distCards": [
    {"placeholder":"dist-1","title":"Traditional Stores","desc":"We support trade partners nationwide with trusted products, competitive pricing, and reliable service to meet the needs of local markets and the construction industry."},
    {"placeholder":"dist-2","title":"Modern Retail","desc":"We partner with leading modern retailers, supplying thousands of products to 500+ stores nationwide with strong logistics, marketing, and training support."},
    {"placeholder":"dist-3","title":"E-Commerce","desc":"Official presence on Lazada and Shopee. We bring trusted Herco hardware brands directly to Filipino consumers through leading e-commerce platforms."},
    {"placeholder":"dist-4","title":"Industrial","desc":"We supply high-quality hardware and materials to the industrial sector, providing tailored solutions for manufacturers, contractors, and government projects."}
  ],
  "about": {
    "whoWeAre": [
      "<strong>HERCO TRADING</strong> is a proudly Filipino, family-owned company and a leading name in the hardware distribution industry in the Philippines since 1908. With over 100 years of experience, we have built a solid reputation as one of the most trusted hardware distributors in the country, known for our unwavering commitment to quality products, customer service excellence, and business integrity.",
      "Our journey began as a single hardware store in Binondo, Manila during the Spanish era. Through strategic growth and innovation, HERCO has evolved into a nationwide distributor serving both wholesale and retail hardware markets. Today, we carry and distribute over 50 globally recognized hardware brands, offering a comprehensive range of tools, home improvement supplies, and construction materials to thousands of trade customers and hundreds of modern retail outlets across the Philippines.",
      "Now managed by a dynamic fifth-generation leadership team, HERCO blends deep industry heritage with modern operations. We invest in advanced logistics systems, digital infrastructure, and efficient warehouse facilities, backed by a large delivery fleet that ensures fast, reliable, and nationwide distribution.",
      "HERCO operates on a global scale. We maintain strong partnerships with international forwarders and consolidators in the USA, Germany, Singapore, Hong Kong, China, and Taiwan, allowing us to seamlessly manage the importation and logistics of top-quality hardware products. This global reach gives us a competitive edge in sourcing and delivering cost-effective, high-performance solutions to our partners.",
      "In addition to hardware, HERCO is affiliated with some of the Philippines' largest and most successful companies in plastic product manufacturing, consumer chemical production, and financial services. These strategic connections expand our business capabilities and enhance the value we provide to customers and stakeholders across multiple industries.",
      "At our core, HERCO is built on a foundation of long-term, growth-oriented partnerships. We actively seek collaboration with world-class manufacturers and hardware suppliers who share our vision of delivering excellence. Our partners benefit from high-volume procurement, strong marketing support, and nationwide brand exposure through our extensive distribution network.",
      "For our customers, HERCO delivers trusted brands, responsive service, and a wide selection of quality products. For our suppliers, we offer a reliable entry point into the fast-growing Philippine market. For all our stakeholders, HERCO remains your dependable partner for profit and growth—grounded in tradition, driven by innovation, and committed to shaping the future of the Philippine hardware industry."
    ],
    "mission": [
      "To build and grow the brands entrusted to us by our principals",
      "To help our customers grow their business by providing them the best products, at the best prices, with the best service.",
      "To provide our employees with a worthwhile and fulfilling employment",
      "To give our stockholders a respectable return on their investment"
    ],
    "vision": "To be the #1 hardware distribution company in the Philippines in terms of revenue, income and breadth of brand portfolio, while maintaining true partnerships with our principals and customers. We will be the best at what we do, and be easy to work at the same time.",
    "affiliates": [
      {"key":"affiliate-1","fallback":"HANDYMAN","alt":"Handyman"},
      {"key":"affiliate-2","fallback":"TRUE VALUE","alt":"True Value"},
      {"key":"affiliate-3","fallback":"FEDCHEM","alt":"Fedchem"}
    ]
  }
};

(function () {
  fetch('../content/site-content.json')
    .then(function (r) { return r.ok ? r.json() : null; })
    .then(function (data) {
      if (data) {
        window.HERCO_SITE = data;
        document.dispatchEvent(new CustomEvent('herco:content-ready'));
      }
    })
    .catch(function () {});
})();
