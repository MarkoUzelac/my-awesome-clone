import { MapPin } from "lucide-react";

const locations = [
  "Poreč",
  "Vrsar",
  "Rovinj",
  "Pazin",
  "Novigrad",
  "Višnjan",
  "Kaštelir",
  "Žbandaj",
];

const LocationsSection = () => {
  return (
    <section className="py-20 bg-secondary/30">
      <div className="container mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">Naše Lokacije</h2>
          <p className="text-muted-foreground">Brz dolazak u sva navedena mjesta.</p>
        </div>

        <div className="flex flex-wrap justify-center gap-4 max-w-3xl mx-auto">
          {locations.map((location, index) => (
            <div
              key={index}
              className="flex items-center gap-2 px-5 py-3 rounded-full bg-card border border-border hover:border-primary/50 hover:bg-primary/5 transition-all duration-300 cursor-default"
            >
              <MapPin className="w-4 h-4 text-primary" />
              <span className="font-medium">{location}</span>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default LocationsSection;
