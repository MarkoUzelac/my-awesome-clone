import { Phone, Car, Wrench } from "lucide-react";

const steps = [
  {
    number: "01",
    icon: Phone,
    title: "Pozovite nas",
    description: "Dostupni smo 0-24h za vas.",
  },
  {
    number: "02",
    icon: Car,
    title: "Dolazimo brzo",
    description: "Stižemo unutar 30 minuta.",
  },
  {
    number: "03",
    icon: Wrench,
    title: "Rješavamo kvar",
    description: "Brz i kvalitetan popravak.",
  },
];

const HowItWorksSection = () => {
  return (
    <section className="py-20 bg-secondary/30">
      <div className="container mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">Kako Funkcionira?</h2>
          <p className="text-muted-foreground">3 jednostavna koraka do rješenja.</p>
        </div>

        <div className="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
          {steps.map((step, index) => (
            <div key={index} className="relative text-center">
              {/* Connector line */}
              {index < steps.length - 1 && (
                <div className="hidden md:block absolute top-12 left-[60%] w-full h-0.5 bg-gradient-to-r from-primary/50 to-transparent" />
              )}

              <div className="relative">
                <span className="text-6xl font-bold text-primary/20">{step.number}</span>
                <div className="absolute top-4 left-1/2 -translate-x-1/2 w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                  <step.icon className="w-8 h-8 text-primary" />
                </div>
              </div>

              <h3 className="text-xl font-bold mt-8 mb-2">{step.title}</h3>
              <p className="text-muted-foreground">{step.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default HowItWorksSection;
