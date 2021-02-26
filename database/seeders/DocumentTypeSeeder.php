<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rows
        $rows = [];

        $rows[] = ["id" => "1", "codigo" => "valueForMoneyAnalysis", "titulo" => "Análisis de valor por dinero", "descripcion" => "Un resumen del análisis del valor por dinero llevado a cabo para el proyecto, junto con figuras de apoyo, cálculos y casos de negocio, basados en resultados de adquisiciones proyectadas o reales.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "2", "codigo" => "technicalSpecifications", "titulo" => "Especificaciones Técnicas", "descripcion" => "Información técnica detallada sobre los bienes o servicios a proveer.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "3", "codigo" => "serviceDescription", "titulo" => "Descripciones de servicios", "descripcion" => "Una descripción de alto nivel de los servicios", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "4", "codigo" => "estimatedDemand", "titulo" => "Demanda estimada", "descripcion" => "Una narrativa que describe la demanda estimada a ser servida (anualmente) por el proyecto.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "5", "codigo" => "contractDraft", "titulo" => "Borrador de contrato", "descripcion" => "Un borrador o copia pro-forma del contrato.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "6", "codigo" => "contractSigned", "titulo" => "Contrato Firmado", "descripcion" => "Una copia del contrato firmado. Considere proveer tanto un documento legible por computadora (p.ej. PDF original, o formato de Word u Open Document) como un documento separado para páginas firmadas digitalizadas donde sea requerido.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "7", "codigo" => "feasibilityStudy", "titulo" => "Estudio de factibilidad", "descripcion" => "Documentación de la evaluación de factibilidad llevada a cabo para este proceso de contratación, proveyendo información sobre los beneficios o costos netos de los bienes, obras o servicios propuestos.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "8", "codigo" => "environmentalImpact", "titulo" => "Impacto Ambiental", "descripcion" => "Documentación de las evaluaciones de impacto ambiental (ej. impacto en flora, fauna y bosques, áreas naturales, emisiones de carbono, etc.) y medidas de mitigación (ej. control de contaminación, soluciones bajas en carbono, madera sustentable, etc.) para este proceso de contratación o proyecto.", "fuente" => "OC4IDS"];
        $rows[] = ["id" => "9", "codigo" => "finalAudit", "titulo" => "Auditoría Final", "descripcion" => "Documentación de una auditoría final llevada a cabo al final de la implementación de un contrato.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "10", "codigo" => "tenderNotice", "titulo" => "Aviso de Licitación", "descripcion" => "El aviso formal que da los detalles de una licitación. Este puede ser un enlace a un documento descargable, a un sitio web o a una gaceta oficial en la cual se contiene el aviso.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "11", "codigo" => "evaluationCommittee", "titulo" => "Detalles de comité de evaluación", "descripcion" => "Información de la constitución del comité de evaluación", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "12", "codigo" => "requestForQualification", "titulo" => "Pedido de Calificación", "descripcion" => "El conjunto de documentos emitidos por la entidad compradora que constituye la base de la calificación y potencialmente la pre-selección de candidatos. Los candidatos calificados serán invitados luego a enviar una propuesta (o a entrar a una nueva fase previa a la presentación de ofertas, tales como una fase de diálogo o una fase interactiva).", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "13", "codigo" => "evaluationCriteria", "titulo" => "Criterios de Evaluación", "descripcion" => "Documentación sobre cómo se evaluarán las ofertas.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "14", "codigo" => "minutes", "titulo" => "Minutas", "descripcion" => "Minutas de reuniones previas a las ofertas, u otras reuniones relevantes.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "15", "codigo" => "shortlistedFirms", "titulo" => "Firmas Preseleccionadas", "descripcion" => "Documentación que provee información sobre las firmas preseleccionadas. Se pueden proveer versiones estructuradas de esta información usando la extensión de ofertas.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "16", "codigo" => "negotiationParameters", "titulo" => "Parámetros de negociación", "descripcion" => "Una descripción de los parámetros para la negociación con el proponente preferido.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "17", "codigo" => "evaluationReports", "titulo" => "Reporte de evaluación", "descripcion" => "Documentación sobre la evaluación de las ofertas y la aplicación de los criterios de evaluación, incluyendo la justificación para la adjudicación", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "18", "codigo" => "contractGuarantees", "titulo" => "Garantías", "descripcion" => "Documentación de garantías relacionadas con el proceso de contratación o el contrato.", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "19", "codigo" => "defaultEvents", "titulo" => "Faltas", "descripcion" => "Información de los eventos relacionados con faltas", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "20", "codigo" => "termination", "titulo" => "Terminación", "descripcion" => "Información sobre terminación del contrato", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "21", "codigo" => "performanceReport", "titulo" => "Reporte (informe) de desempeño", "descripcion" => "Reportes (informes) de evaluación de desempeño", "fuente" => "OCDS for PPPs"];
        $rows[] = ["id" => "22", "codigo" => "plannedProcurementNotice", "titulo" => "Aviso de adquisición planeada", "descripcion" => "Un aviso publicado por la entidad de adquisición acerca de sus planes para una futura compra, también conocida como aviso de información previa. La entidad de adquisición puede usar el aviso de adquisición planeada como un aviso de licitación.", "fuente" => "OCDS"];
        $rows[] = ["id" => "23", "codigo" => "awardNotice", "titulo" => "Aviso de adjudicación", "descripcion" => "El aviso formal que da detalles de la adjudicación del contrato. Esto puede ser un enlace a un documento descargable, una página web, o a una gaceta oficial en la que el aviso está contenido.", "fuente" => "OCDS"];
        $rows[] = ["id" => "24", "codigo" => "contractNotice", "titulo" => "Aviso de contrato", "descripcion" => "El aviso formal que provee detalles de un contrato siendo firmado y válido para empezar la implementación. Este puede ser un enlace a un documento descargable, una página web o a una gaceta oficial en la que el aviso está contenido.", "fuente" => "OCDS"];
        $rows[] = ["id" => "25", "codigo" => "completionCertificate", "titulo" => "Certificado de finalización", "descripcion" => "Un certificado de finalización expedido por la autoridad relevante que provee evidencia de que las obras fueron finalizadas hasta un cierto nivel de calidad. Los certificados de finalización podrían ser relevantes sólo para tipos particulares de procesos de contratación.", "fuente" => "OCDS"];
        $rows[] = ["id" => "26", "codigo" => "procurementPlan", "titulo" => "Plan de adquisiciones", "descripcion" => "Documentación que establece las bases para este proceso de contratación en particular.", "fuente" => "OCDS"];
        $rows[] = ["id" => "27", "codigo" => "biddingDocuments", "titulo" => "Documentos de oferta", "descripcion" => "Documentación para proveedores potenciales, describiendo las metas del contrato (p.ej. bienes y servicios a contratar) y el proceso de envío de propuestas.", "fuente" => "OCDS"];
        $rows[] = ["id" => "28", "codigo" => "contractArrangements", "titulo" => "Arreglos para finalizar un contrato", "descripcion" => "Documentación de los arreglos para terminar el contrato(s).", "fuente" => "OCDS"];
        $rows[] = ["id" => "29", "codigo" => "contractSchedule", "titulo" => "Calendario del contrato", "descripcion" => "Cualquier documento que contenga términos adicionales, obligaciones o información relacionada con el contrato, tal como un calendario, apéndice, anexo, adenda o adición.", "fuente" => "OCDS"];
        $rows[] = ["id" => "30", "codigo" => "physicalProgressReport", "titulo" => "Reportes de progreso físico", "descripcion" => "Documentación sobre el estado de la implementación, usualmente comparado con hitos clave.", "fuente" => "OCDS"];
        $rows[] = ["id" => "31", "codigo" => "financialProgressReport", "titulo" => "Reportes de progreso financiero", "descripcion" => "Documentación que provee fechas y montos de pagos realizados (contra el monto total) y el origen de esos pagos, incluyendo excesos de costos, si los hay. Se pueden proveer versiones estructuradas de esta información a través de las transacciones de implementación del contrato.", "fuente" => "OCDS"];
        $rows[] = ["id" => "32", "codigo" => "hearingNotice", "titulo" => "Aviso de audiencia pública", "descripcion" => "Documentación de cualquier audiencia que ocurrió como parte de la planeación de este proceso de contratación.", "fuente" => "OCDS"];
        $rows[] = ["id" => "33", "codigo" => "marketStudies", "titulo" => "Estudios de mercado", "descripcion" => "Documentación de cualquier estudio de mercado que haya ocurrido como parte de la planeación de este proceso de contrato.", "fuente" => "OCDS"];
        $rows[] = ["id" => "34", "codigo" => "eligibilityCriteria", "titulo" => "Criterios de elegibilidad", "descripcion" => "Documentos detallados sobre la elegibilidad de los licitantes.", "fuente" => "OCDS"];
        $rows[] = ["id" => "35", "codigo" => "clarifications", "titulo" => "Aclaraciones a las preguntas de los licitantes", "descripcion" => "Documentación que provee las respuestas a las cuestiones apuntadas en reuniones pre-ofertas o procesos de preguntas.", "fuente" => "OCDS"];
        $rows[] = ["id" => "36", "codigo" => "assetAndLiabilityAssessment", "titulo" => "Evaluación de los activos y responsabilidades del gobierno", "descripcion" => "Documentación que cubre las evaluaciones de los activos y responsabilidades del gobierno relacionados con este proceso de contratación.", "fuente" => "OCDS"];
        $rows[] = ["id" => "37", "codigo" => "riskProvisions", "titulo" => "Cláusulas para el manejo de riesgos y responsabilidades", "descripcion" => "Documentación que cubre cómo se manejarán los riesgos como parte de este proceso de contratación.", "fuente" => "OCDS"];
        $rows[] = ["id" => "38", "codigo" => "winningBid", "titulo" => "Oferta ganadora", "descripcion" => "Documentación de la oferta ganadora, incluyendo, cuando aplique, una copia completa de la oferta recibida.", "fuente" => "OCDS"];
        $rows[] = ["id" => "39", "codigo" => "complaints", "titulo" => "Quejas y decisiones", "descripcion" => "Documentación de cualquier queja recibida o decisiones en respuesta a dichas quejas.", "fuente" => "OCDS"];
        $rows[] = ["id" => "40", "codigo" => "contractAnnexe", "titulo" => "Anexos al contrato", "descripcion" => "Copias de anexos y otra documentación de soporte relacionados con el contrato.", "fuente" => "OCDS"];
        $rows[] = ["id" => "41", "codigo" => "subContract", "titulo" => "Subcontratos", "descripcion" => "Documentación que detalla los subcontratos y/o provee una copia de los subcontratos. Donde haya datos de OCDS sobre los subcontratos, puede declararse usando el bloque de relatedProcess.", "fuente" => "OCDS"];
        $rows[] = ["id" => "42", "codigo" => "needsAssessment", "titulo" => "Evaluación de necesidades", "descripcion" => "Documentación de la evaluación de necesidades llevada a cabo para este proceso de contratación o proyecto, aborda la demanda para el proyecto o inversión para las comunidades afectadas o usuarios.", "fuente" => "OC4IDS"];
        $rows[] = ["id" => "43", "codigo" => "projectPlan", "titulo" => "Plan de proyecto", "descripcion" => "Documentación de la planeación de proyecto para este proceso de contratación y, donde aplique, una copia del documento del plan de proyecto", "fuente" => "OCDS"];
        $rows[] = ["id" => "44", "codigo" => "billOfQuantity", "titulo" => "Estimación cuantitativa", "descripcion" => "Documentación que provee la información desglosada de materiales, partes y mano de obra y los términos y condiciones para su provisión, dando información que permitirá a los licitadores dar efectivamente un precio. Se pueden proveer versiones estructuradas de artículos y cantidades en la etapa de licitación, adjudicación y contrato usando las unidades dentro del bloque de artículos.", "fuente" => "OCDS"];
        $rows[] = ["id" => "45", "codigo" => "bidders", "titulo" => "Información de Licitante", "descripcion" => "Documentación sobre los oferentes o participantes, sus documentos de validación y cualquier excepción de procedimientos para el cual califiquen.", "fuente" => "OCDS"];
        $rows[] = ["id" => "46", "codigo" => "conflictOfInterest", "titulo" => "Conflicto de interés", "descripcion" => "Documentación de conflictos de interés declarados o descubiertos.", "fuente" => "OCDS"];
        $rows[] = ["id" => "47", "codigo" => "debarments", "titulo" => "Inhabilitaciones", "descripcion" => "Documentación de cualquier inhabilitación efectuada.", "fuente" => "OCDS"];
        $rows[] = ["id" => "48", "codigo" => "illustration", "titulo" => "Ilustraciones", "descripcion" => "Imágenes destinadas a proveer información de soporte. La URL para imágenes debería estar dirigida directamente a un archivo de imagen que las aplicaciones puedan desplegar como parte de una galería de imágenes. En la fase de licitación, las imágenes pueden ser ilustraciones de bienes, trabajos o servicios requeridos o a la venta. En la fase de implementación, las imágenes pueden ser ilustraciones o evidencia visual de progreso físico.", "fuente" => "OCDS"];
        $rows[] = ["id" => "49", "codigo" => "submissionDocuments", "titulo" => "Documentos de presentación de oferta", "descripcion" => "Documentación enviada por un licitante como parte de su oferta", "fuente" => "OCDS"];
        $rows[] = ["id" => "50", "codigo" => "contractSummary", "titulo" => "Resumen del contrato", "descripcion" => "Documentación que da una imagen general de los términos y secciones clave del contrato. Comúnmente usado para contratos largos y complejos.", "fuente" => "OCDS"];
        $rows[] = ["id" => "51", "codigo" => "cancellationDetails", "titulo" => "Detalles de cancelación", "descripcion" => "Documentación de los acuerdos, o razones, para la cancelación de un proceso de contratación, adjudicación o contrato específico.", "fuente" => "OCDS"];
        $rows[] = ["id" => "52", "codigo" => "projectScope", "titulo" => "Alcance del proyecto", "descripcion" => "Una descripción de los principales resultados del proyecto que serán llevados a construcción (incluyendo tipo, cantidad y unidades)", "fuente" => "OC4IDS"];
        $rows[] = ["id" => "53", "codigo" => "landAndSettlementImpact", "titulo" => "Impacto en tierras y reasentamientos", "descripcion" => "Indica la cantidad de tierras y propiedades que fueron adquiridas para el proyecto (ej. 25km² de tierras), y resume los impactos relacionados (ej. problemas arqueológicos (se relocalizó un cementerio sajón), asentamientos locales/indígenas (se relocalizaron 5 aldeas indígenas de 500 habitantes cada una), impactos en negocios locales (ej. se compraron 30 propiedades comerciales)).", "fuente" => "OC4IDS"];
        $rows[] = ["id" => "54", "codigo" => "projectEvaluation", "titulo" => "Evaluación del proyecto", "descripcion" => "Generalmente publicado al terminar un proyecto, provee un resumen técnico y financiero de la entrega.", "fuente" => "OC4IDS"];
        $rows[] = ["id" => "55", "codigo" => "budgetApproval", "titulo" => "Aprobación del presupuesto", "descripcion" => "Detalles adicionales sobre la aprobación del presupuesto.", "fuente" => "OC4IDS"];


        // Disable FKs & truncate table
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('DocumentType')->truncate();

        // Date now
        $date = Carbon::now();

        // Create rows
        foreach($rows as $row)
        {
            DB::table('DocumentType')->insert([
                'id'          => $row['id'],
                'codigo'      => $row['codigo'],
                'titulo'      => $row['titulo'],
                'descripcion' => $row['descripcion'],
                'fuente'      => $row['fuente'],
                'created_at'  => $date,
                'updated_at'  => $date,
            ]);
        }

        // Enable FKs
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
