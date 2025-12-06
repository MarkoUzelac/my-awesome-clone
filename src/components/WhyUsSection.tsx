import { Clock, Zap, Users, Shield, Star, BadgeCheck } from "lucide-react";

const features = [
  {
    icon: Clock,
    title: "Dostupni 0-24h",
    description: "Uvijek tu kada nas trebate",
  },
  {
    icon: Zap,
    title: "Brz dolazak",
    description: "Stižemo unutar 30 minuta",
  },
  {
    icon: Users,
    title: "Stručni tim",
    description: "Certificirani majstori",
  },
  {
    icon: Shield,
    title: "Garancija",
    description: "Jamstvo na sve radove",
  },
  {
    icon: Star,
    title: "Kvaliteta",
    description: "Vrhunski materijali",
  },
  {
    icon: BadgeCheck,
    title: "Fiksne cijene",
    description: "Bez skrivenih troškova",
  },
];

const WhyUsSection = () => {
  return (
    <section className="py-20 bg-secondary/30">
      <div className="container mx-auto">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-12">
          Zašto Nas Odabrati?
        </h2>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
          {features.map((feature, index) => (
            <div
              key={index}
              className="card-glass text-center p-6 hover:scale-105 transition-transform duration-300"
              style={{ animationDelay: `${index * 0.1}s` }}
            >
              <div className="w-14 h-14 mx-auto mb-4 rounded-xl bg-primary/10 flex items-center justify-center">
                <feature.icon className="w-7 h-7 text-primary" />
              </div>
              <h3 className="font-semibold text-foreground mb-1">{feature.title}</h3>
              <p className="text-sm text-muted-foreground">{feature.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default WhyUsSection;
