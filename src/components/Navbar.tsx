import { Phone, ShoppingCart, User } from "lucide-react";

const Navbar = () => {
  return (
    <nav className="fixed top-0 left-0 right-0 z-50 bg-background/80 backdrop-blur-lg border-b border-border">
      <div className="container mx-auto flex items-center justify-between py-4">
        <a href="/" className="text-2xl font-bold">
          <span className="text-foreground">Majstor</span>
          <span className="text-primary"> 247</span>
        </a>

        <div className="hidden md:flex items-center gap-6">
          <a href="#" className="px-4 py-2 rounded-full border border-border text-sm font-medium hover:bg-secondary transition-colors">
            Rezerviraj
          </a>
          <a href="#" className="flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors">
            <span className="text-lg">📄</span> CV Maker
          </a>
          <a href="#" className="flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors">
            <span className="text-lg">👑</span> Članstvo
          </a>
          <a href="#usluge" className="text-muted-foreground hover:text-foreground transition-colors">
            Usluge
          </a>
        </div>

        <div className="flex items-center gap-4">
          <button className="hidden md:flex p-2 text-muted-foreground hover:text-foreground transition-colors">
            <User className="w-5 h-5" />
          </button>
          <button className="hidden md:flex p-2 text-muted-foreground hover:text-foreground transition-colors">
            <ShoppingCart className="w-5 h-5" />
          </button>
          <a href="tel:0989630462" className="btn-primary">
            <Phone className="w-4 h-4" />
            <span className="hidden sm:inline">098 963 0462</span>
          </a>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;
