import { Star } from "lucide-react";

const testimonials = [
  {
    quote: "Brza reakcija i profesionalna usluga!",
    author: "Ana M.",
    service: "Električar",
  },
  {
    quote: "Riješili problem u rekordnom roku.",
    author: "Marko P.",
    service: "Vodoinstalater",
  },
  {
    quote: "Odličan bravar, došao za 20 minuta.",
    author: "Ivana K.",
    service: "Bravar",
  },
];

const TestimonialsSection = () => {
  return (
    <section className="py-20">
      <div className="container mx-auto">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold mb-4">Iskustva Klijenata</h2>
        </div>

        <div className="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
          {testimonials.map((testimonial, index) => (
            <div key={index} className="card-glass text-center">
              <div className="flex justify-center gap-1 mb-4">
                {[...Array(5)].map((_, i) => (
                  <Star key={i} className="w-5 h-5 fill-primary text-primary" />
                ))}
              </div>

              <blockquote className="text-lg font-medium mb-4">
                "{testimonial.quote}"
              </blockquote>

              <div className="text-muted-foreground">
                <span className="font-semibold text-foreground">{testimonial.author}</span>
                <span className="mx-2">•</span>
                <span>{testimonial.service}</span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default TestimonialsSection;
