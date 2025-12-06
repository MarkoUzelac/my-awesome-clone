import { Send } from "lucide-react";
import { useState } from "react";
import { toast } from "@/hooks/use-toast";

const ContactForm = () => {
  const [formData, setFormData] = useState({
    name: "",
    phone: "",
    service: "",
    message: "",
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    toast({
      title: "Upit poslan!",
      description: "Javit ćemo vam se u najkraćem roku.",
    });
    setFormData({ name: "", phone: "", service: "", message: "" });
  };

  return (
    <div id="contact-form" className="card-glass animate-fade-in">
      <h2 className="text-2xl font-bold mb-2">Brzi Upit</h2>
      <p className="text-muted-foreground mb-6">Opišite problem, odgovaramo odmah.</p>

      <form onSubmit={handleSubmit} className="space-y-4">
        <div className="grid grid-cols-2 gap-4">
          <div>
            <label className="block text-sm text-muted-foreground mb-2">Ime</label>
            <input
              type="text"
              placeholder="Vaše ime"
              value={formData.name}
              onChange={(e) => setFormData({ ...formData, name: e.target.value })}
              className="w-full px-4 py-3 rounded-lg bg-input border border-border text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all"
              required
            />
          </div>
          <div>
            <label className="block text-sm text-muted-foreground mb-2">Telefon</label>
            <input
              type="tel"
              placeholder="098..."
              value={formData.phone}
              onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
              className="w-full px-4 py-3 rounded-lg bg-input border border-border text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all"
              required
            />
          </div>
        </div>

        <div>
          <label className="block text-sm text-muted-foreground mb-2">Vrsta usluge</label>
          <select
            value={formData.service}
            onChange={(e) => setFormData({ ...formData, service: e.target.value })}
            className="w-full px-4 py-3 rounded-lg bg-input border border-border text-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all appearance-none cursor-pointer"
            required
          >
            <option value="">Odaberite uslugu</option>
            <option value="vodoinstalater">Vodoinstalater</option>
            <option value="elektricar">Električar</option>
            <option value="bravar">Bravar</option>
            <option value="ciscenje">Čišćenje</option>
            <option value="selidbe">Selidbe</option>
          </select>
        </div>

        <div>
          <label className="block text-sm text-muted-foreground mb-2">Poruka</label>
          <textarea
            placeholder="Kratki opis kvara..."
            rows={4}
            value={formData.message}
            onChange={(e) => setFormData({ ...formData, message: e.target.value })}
            className="w-full px-4 py-3 rounded-lg bg-input border border-border text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all resize-none"
          />
        </div>

        <button type="submit" className="w-full btn-primary py-4 text-lg animate-pulse-glow">
          <Send className="w-5 h-5" />
          Pošalji Besplatno
        </button>
      </form>
    </div>
  );
};

export default ContactForm;
