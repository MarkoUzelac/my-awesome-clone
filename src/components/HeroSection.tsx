import { Phone, ArrowRight, Clock } from "lucide-react";
import ContactForm from "./ContactForm";

const HeroSection = () => {
  return (
    <section className="relative pt-32 pb-20 overflow-hidden">
      {/* Background gradient */}
      <div className="absolute inset-0 bg-gradient-to-br from-background via-background to-secondary/20" />
      
      <div className="container mx-auto relative z-10">
        <div className="grid lg:grid-cols-2 gap-12 items-start">
          {/* Left Content */}
          <div className="space-y-8 animate-fade-in">
            <div className="badge-live">
              <Clock className="w-4 h-4" />
              DOSTUPNI 0-24H
            </div>

            <h1 className="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
              Hitni Majstori
              <br />
              <span className="text-gradient">Poreč & Istra</span>
            </h1>

            <p className="text-lg text-muted-foreground max-w-lg">
              Dolazak unutar <span className="text-foreground font-semibold">30 minuta</span>. Vodoinstalater, Električar, Bravar. Brzo, sigurno i povoljno.
            </p>

            <div className="flex flex-wrap gap-4">
              <a href="tel:0989630462" className="btn-primary text-lg py-4 px-8">
                <Phone className="w-5 h-5" />
                Pozovite Odmah
              </a>
              <a href="#contact-form" className="btn-secondary text-lg py-4 px-8">
                Pošalji upit
                <ArrowRight className="w-5 h-5" />
              </a>
            </div>

            {/* Stats */}
            <div className="flex gap-8 pt-8 border-t border-border">
              <div>
                <div className="text-4xl font-bold text-foreground">5000+</div>
                <div className="text-sm text-muted-foreground uppercase tracking-wide">Intervencija</div>
              </div>
              <div>
                <div className="text-4xl font-bold text-foreground">98%</div>
                <div className="text-sm text-muted-foreground uppercase tracking-wide">Zadovoljnih</div>
              </div>
              <div>
                <div className="text-4xl font-bold text-foreground">10+</div>
                <div className="text-sm text-muted-foreground uppercase tracking-wide">Godina</div>
              </div>
            </div>
          </div>

          {/* Right Content - Form */}
          <div className="lg:pl-8" style={{ animationDelay: '0.2s' }}>
            <ContactForm />
          </div>
        </div>
      </div>
    </section>
  );
};

export default HeroSection;
