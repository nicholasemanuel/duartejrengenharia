export interface Project {
  id: string;
  title: string;
  slug: string;
  description: string;
  longDescription: string;
  category: 'Residencial' | 'Comercial' | 'Industrial' | 'Infraestrutura';
  location: string;
  client: string;
  area: number; // em m²
  year: number;
  image: string;
  status: 'Concluído' | 'Em Construção' | 'Em Projeto';
}
