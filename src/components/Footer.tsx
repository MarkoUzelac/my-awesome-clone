import { Phone, Mail } from "lucide-react";

const Footer = () => {
  return (
    <footer className="py-12 bg-secondary/50 border-t border-border">
      <div className="container mx-auto">
        <div className="flex flex-col md:flex-row items-center justify-between gap-6">
          <div className="text-2xl font-bold">
            <span className="text-foreground">Majstor</span>
            <span className="text-primary"> 247</span>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-4">
            <a href="tel:0989630462" className="btn-primary">
              <Phone className="w-4 h-4" />
              Pozovi
            </a>
            <a href="mailto:info@majstor247.online" className="btn-secondary">
              <Mail className="w-4 h-4" />
              Email
            </a>
          </div>

          <p className="text-sm text-muted-foreground">
            © 2024 Majstor 247. Sva prava pridržana.
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
