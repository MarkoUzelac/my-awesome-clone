import { Droplets, Zap, Key, Sparkles, Truck, ArrowRight } from "lucide-react";

const services = [
  {
    icon: Droplets,
    title: "Vodoinstalater",
    description: "Hitne intervencije, popravci cijevi, odvoda, sanitarija",
    features: ["Curenje cijevi", "Začepljeni odvodi", "Montaža sanitarija", "Bojleri"],
    color: "from-blue-500 to-cyan-500",
  },
  {
    icon: Zap,
    title: "Električar",
    description: "Električne instalacije, kvarovi, sigurnosne provjere",
    features: ["Nestanak struje", "Kratki spojevi", "Instalacije", "LED rasvjeta"],
    color: "from-yellow-500 to-orange-500",
  },
  {
    icon: Key,
    title: "Bravar",
    description: "Otvaranje vrata, zamjena brave, sigurnosne vrata",
    features: ["Otvaranje vrata", "Zamjena brave", "Sigurnosne brave", "Ključevi"],
    color: "from-purple-500 to-pink-500",
  },
  {
    icon: Sparkles,
    title: "Čišćenje",
    description: "Dubinsko čišćenje, redovno održavanje apartmana",
    features: ["Dubinsko čišćenje", "Čišćenje poslije gostiju", "Čišćenje prozora", "Pranje tepiha"],
    color: "from-green-500 to-emerald-500",
  },
  {
    icon: Truck,
    title: "Selidbe",
    description: "Profesionalne selidbe, transport robe, montaža",
    features: ["Selidbe stanova", "Transport namještaja", "Pakiranje", "Montaža"],
    color: "from-red-500 to-rose-500",
  },
];

const ServicesSection = () => {
  return (
    <section id="usluge" className="py-20">
      <div className="container mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">Naše Usluge</h2>
          <p className="text-muted-foreground max-w-xl mx-auto">
            Profesionalna rješenja za vaš dom. Brzo, kvalitetno i dostupno 0-24h.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          {services.map((service, index) => (
            <div
              key={index}
              className="card-glass group hover:scale-[1.02] transition-all duration-300"
            >
              <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${service.color} flex items-center justify-center mb-4`}>
                <service.icon className="w-7 h-7 text-foreground" />
              </div>

              <h3 className="text-xl font-bold mb-2">{service.title}</h3>
              <p className="text-muted-foreground mb-4">{service.description}</p>

              <ul className="space-y-2 mb-6">
                {service.features.map((feature, i) => (
                  <li key={i} className="flex items-center gap-2 text-sm text-muted-foreground">
                    <div className="w-1.5 h-1.5 rounded-full bg-primary" />
                    {feature}
                  </li>
                ))}
              </ul>

              <a
                href="#contact-form"
                className="inline-flex items-center gap-2 text-primary font-medium hover:gap-3 transition-all"
              >
                Naruči uslugu
                <ArrowRight className="w-4 h-4" />
              </a>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ServicesSection;
