import { Droplets, Zap, Key } from "lucide-react";

const pricingPlans = [
  {
    icon: Droplets,
    title: "Vodoinstalater",
    services: [
      { name: "Odštopavanje WC-a", price: "50€" },
      { name: "Curenje cijevi", price: "80€" },
      { name: "Popravak bojlera", price: "120€" },
      { name: "Hitna intervencija", price: "100€" },
    ],
  },
  {
    icon: Zap,
    title: "Električar",
    services: [
      { name: "Kratki spoj", price: "70€" },
      { name: "Nestanak struje", price: "85€" },
      { name: "Zamjena osigurača", price: "55€" },
      { name: "Hitna intervencija", price: "110€" },
    ],
  },
  {
    icon: Key,
    title: "Bravar",
    services: [
      { name: "Otvaranje vrata", price: "60€" },
      { name: "Izgubljeni ključevi", price: "50€" },
      { name: "Otvaranje auta", price: "75€" },
      { name: "Hitna intervencija", price: "95€" },
    ],
  },
];

const PricingSection = () => {
  return (
    <section className="py-20">
      <div className="container mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">Cjenik Usluga</h2>
          <p className="text-muted-foreground">Transparentne cijene. Bez iznenađenja.</p>
        </div>

        <div className="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
          {pricingPlans.map((plan, index) => (
            <div key={index} className="card-glass hover:scale-[1.02] transition-transform duration-300">
              <div className="flex items-center gap-3 mb-6">
                <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                  <plan.icon className="w-6 h-6 text-primary" />
                </div>
                <h3 className="text-xl font-bold">{plan.title}</h3>
              </div>

              <ul className="space-y-4 mb-6">
                {plan.services.map((service, i) => (
                  <li key={i} className="flex items-center justify-between">
                    <span className="text-muted-foreground">{service.name}</span>
                    <span className="font-semibold text-primary">{service.price}</span>
                  </li>
                ))}
              </ul>

              <a href="#contact-form" className="block w-full btn-secondary text-center">
                Rezerviraj termin
              </a>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default PricingSection;
